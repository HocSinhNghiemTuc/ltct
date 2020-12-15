<?php

namespace Modules\User\Services;

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

class UserService
{

    public function index($user)
    {
        return  $user->paginate(10);

    }

    public function create($role)
    {
        $roles = $role->all();
        return $roles;
    }

    public function store( $request,$user)
    {


            $users = $user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $users->roles()->attach($request->role_id);
            DB::commit();
            return $users;

    }

    public function editRole($role)
    {
        $role = $role->all();

        return $role;
    }
    public function editUser($user,$id)
    {
        $user = $user->find($id);

        return $user;
    }

    public function update( $request,$user, $id)
    {
            $user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $user->find($id);
            $user->roles()->sync($request->role_id);
            return $user;

    }

    public function delete($id,$user)
    {
        $user->find($id)->delete();

    }
}
