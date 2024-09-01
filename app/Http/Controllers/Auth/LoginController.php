<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login', ['title' => 'Login']);
    }
    public function store(LoginRequest $request){
        if(auth()->attempt($request->validated())) {
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors('Periksa kembali username dan password Anda.');
    }
}
