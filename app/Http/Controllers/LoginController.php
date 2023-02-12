<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // dd(bcrypt(env('PASSWORD_SALT') . '12345' . env('PASSWORD_SALT')));
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }


    public function authenticate(Request $request)
    {
        // dd($request->password);
        $credentials = $request->validate([
            // 'email' => 'required|email:dns', ketat
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // done berhasil
        $credentials['password'] = env('PASSWORD_SALT') . $request->password . env('PASSWORD_SALT');

        // authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // sesi terhapus
        $request->session()->invalidate();
        // bikin baru tokennya
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
