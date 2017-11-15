<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/ads/all';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        return 'telephone';
    }

	protected function validateLogin(Request $request)
	{
		$this->validate($request, [
			$this->username() => 'required|string',
			'password' => 'required|string',
		]);

	}

	public function login(Request $request)
	{
		$this->validateLogin($request);

		$verfication = $this->isVerified($request);
		if($verfication instanceof User){
			$request->session()->put('user_verification_id', $verfication->id);
			return redirect('/auth/verify')->with('user_verification_id', $verfication->id);
		}else if($verfication == -1){
			return redirect('/login')->withErrors(['telephone' => 'Your account does not exists']);
		}

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if ($this->attemptLogin($request)) {
			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	private function isVerified($request){
    	try{
		    $user = User::where('telephone' , '=' , $request->get('telephone'))->firstOrFail();
		    if ($user->verified == 0){
			    return $user;
		    }
		    return 1;
	    }catch (ModelNotFoundException $ex){
    		return -1;
	    }
	}
}
