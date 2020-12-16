<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    private $user;


    public function __construct(User $user)
    {
        $this->user = $user;

    }
    public function loginAdmin()
    {
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->to('/');
        }
        else
        {
            $request->session()->flash('Fail', 'Ban nhập sai thông tin tài khoản!');
            return redirect()->to('/login');
        }

    }
    public function signUpAdmin()
    {
        return view('signup');
    }
    public function postSignUpAdmin(Request $request)
    {   try {
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $request->session()->flash('Thanh Cong', 'Tạo tài khoản mới thành công, mời bạn đăng nhập!');
        return redirect()->to('/login');
    }
    catch (\Exception $exception) {

        $request->session()->flash('FailSignUp', 'Trùng email hoặc bạn nhập sai thông tin, mời bạn đăng ký lại!');
        return redirect()->to('/signup');
    }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function home()
    {
        return view('home');
    }
    public function editAcc($id)
    {
        $user = $this->user->find($id);

        return view('editAccount', compact( 'user'));

    }

    public function updateAcc(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            DB::commit();
            $request->session()->flash('Success', 'Cập nhật thông tin thành công!');
            return redirect()->route('editAcc', ['id' => Auth::user()->id]);
        } catch (\Exception $exception) {
            DB::rollBack();
            $request->session()->flash('FailUpdate', 'Trùng email hoặc bạn nhập sai thông tin, mời bạn nhập lại!');
            return redirect()->route('editAcc', ['id' => Auth::user()->id]);

        }

    }

}
