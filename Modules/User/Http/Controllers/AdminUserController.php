<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Role;
use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;
use Illuminate\Support\Facades\DB;
use Modules\User\Services\UserService;
use Illuminate\Support\Facades\Auth;
class AdminUserController extends Controller
{
    use DeleteModelTrait;

    private $user;
    private $role;
    protected $userService;
    public function __construct(UserService $userService, Role $role,User $user)
    {
        $this->userService = $userService;
        $this->role = $role;
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->userService->index(Auth::user());
        return view('user::index', compact('users'));

    }

    public function create()
    {
        $roles = $this->userService->create($this->role);
        return view('user::add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->userService->store($request,$this->user);
            DB::commit();
            return redirect()->route('users.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }

    }

    public function edit($id)
    {
        $roles = $this->userService->editRole($this->role);
        $user = $this->userService->editUser($this->user,$id);
        $rolesOfUser = $user->roles;
        return view('user::edit', compact('roles', 'user', 'rolesOfUser'));

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->userService->update($request,$this->user,$id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }

    }

    public function delete($id)
    {
        $this->userService->delete($id,$this->user);
        return redirect()->route('users.index');
    }
}
