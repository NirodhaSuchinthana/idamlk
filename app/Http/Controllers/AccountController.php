<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function showRegisterForm()
    {
	    return view('auth.register');
    }

    public function registerUser(Request $request)
    {
		$validatedData = $request->validate([
			'telephone' => 'required|unique:users|max:15|min:5',
			'first_name' => 'required'
		]);
    }
}
