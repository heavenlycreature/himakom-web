<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

}
