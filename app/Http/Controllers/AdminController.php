<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
            return redirect()->to('/login');
        }

    }
    public function signUpAdmin()
    {
        return view('signup');
    }
    public function postSignUpAdmin(Request $request)
    {
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->to('/login');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function home()
    {
        return view('home');
    }

}
