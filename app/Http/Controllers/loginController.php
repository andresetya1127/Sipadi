<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login()
    {

        $title = 'Login';
        return view('pages/login', compact('title'));
    }

    public function actionLogin(Request $request)
    {
        // $pas = Hash::make('123');
        // dd($pas);
        $data = [
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            Session::flash('logged_in', 'Selamat Datang !');
            return redirect('dashboard');
        } else {
            Session::flash('error', 'Data Kurang Teapt !');
            return redirect('login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('root');
    }
}
