<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $title = 'Login';
    public function index(){
        return view('auth.login');
    }
    public function store(LoginRequest $request){
        if(auth()->attempt($request->validated())) {
            return redirect()->intended('/dashboard');
        }
        return back();
    }
}
