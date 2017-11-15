<?php

namespace App\Http\Controllers\Auth;

use App\EmailSubscription;
use App\Mail\ConfirmRegistration;
use App\User;
use App\Http\Controllers\Controller;
use App\UserVerification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'required|string|min:6|confirmed',
	        'telephone' => ['required', 'unique:users', 'regex:/^\d+$/'],
	        'agree' => 'accepted',
	        'address' => 'nullable|max:250|string|min:10'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
	    if (isset($data['subscribe']) && isset($data['email']))
	    {
		    $subscriber = EmailSubscription::firstOrNew(['email' => $data['email']]);
		    $subscriber->save();
	    }

    	if (!isset($data['email']))
    		$data['email'] = '';

	    if (!isset($data['last_name']))
		    $data['last_name'] = '';

	    if (!isset($data['address']))
		    $data['address'] = '';

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
	        'telephone' => $data['telephone'],
	        'address' => $data['address'],
        ]);

		$pin = $this->generatePIN(4);

		$verification = new UserVerification();
		$verification->verification = $pin;
		$verification->user()->associate($user);
		$verification->save();

		if (strlen($data['email']) > 0){
			Mail::to($data['email'])->send(new ConfirmRegistration($user, $pin));
		}

		// send also a text confirmation

	    return $user;
    }

	public function generatePIN($digits = 4){
		$i = 0; //counter
		$pin = ""; //our default pin is blank.
		while($i < $digits){
			//generate a random number between 0 and 9.
			$pin .= mt_rand(0, 9);
			$i++;
		}
		return $pin;
	}

    public function register( Request $request ) {
	    $validator = $this->validator($request->all())->validate();

	    if ($validator != null && $validator->fails()){
	    	return redirect('/register')->withErrors($validator)->withInput(Input::all());
	    }

	    $user = $this->create($request->all());
		$request->session()->put('user_verification_id', $user->id);
	    return redirect('/auth/verify')->with('user_verification_id', $user->id);
    }

    public function showRegistrationForm()
    {
	    return view('auth.register');
    }

	public function showVerification(){
		return view('auth.verification');
	}

	public function verifyAccount(Request $request, $user, $pin){
		if($this->isVerified($user, $pin)){
			return redirect('/login')->with('message', 'Verification successful please login');
		}else{
			abort(404);
		}
	}

	public function doVerification(Request $request){
		if($this->isVerified($request->get('user_id'), $request->get('verification'))){
			return redirect('/login')->with('message', 'Verification successful please login');
		}else{
			$request->session()->put('user_verification_id', $request->get('user_id'));
			return redirect('/auth/verify')->with('user_verification_id', $request->get('user_id'))->withErrors(['verification' => 'Verification failed']);
		}
	}

	private function isVerified($userID, $pin){
		try{
			$data = UserVerification::where([['user_id', '=', $userID], ['verification' , '=', $pin]])->firstOrFail();
			$user = User::find($data->user_id);
			$user->verified = 1;
			$user->save();
			$data->delete();

			return $user;
		}catch (ModelNotFoundException $exception){
			return false;
		}
	}
}
