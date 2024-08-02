<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
{
    public function authorize() : bool{
        return true;
    }
    public function rules() : array {
        return [
            'username' => 'required|min:2',
            'password' => 'required'
        ];
    }
}
