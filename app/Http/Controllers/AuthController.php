<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back();
        }

        session([
            'is_logged_in' => true,
            'user_id'      => $user->id,
            'username'     => $user->name,
        ]);

        return redirect()->route('dashboard');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        User::create([
            'name'     => $request->name,
            'password' => $request->password,
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }
}
