<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dash';

	public function __construct()
	{
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}

	public function showLoginForm() {
        return view('admin.login');
    }

    public function guard() {
        return Auth::guard('admin');
    }
}
