<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LogoutController extends Controller
{
    public function logout()
    {

        $data = [
            'user' => session('auth'),
        ];
        $response = Http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/destroy_token', $data);

        $response = json_decode($response, true);

        // dd($response);
        if ($response) {
            session()->forget('auth');
            return redirect()->route('home')->with('success', 'Succesfully Logged out');
        }else{
            return redirect()->back();
        }

    }
}
