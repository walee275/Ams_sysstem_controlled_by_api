<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/login', $request);

        $response = json_decode($response, true);
        session(['auth' => $response['user']]);
        session(['token' => $response['token']]);
        // dd(session('token'));

        if (!empty(session('auth.error'))) {
            return redirect()->route('login')->with('error', 'Invalid Combination');
        } else {

            if (strtolower(session('auth.user_type')) == "super_admin") {
                return redirect()->route('main');
            } elseif (strtolower(session('auth.user_type')) == "student") {
                return redirect()->route('main');
            } else {
                return redirect()->route('login')->with('error', 'Invalid Combination');
            }
        }
    }
}
