<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Manager;
use Illuminate\Http\Request;
use App\Policies\ManagerAuthPolicy;

class AuthController extends Controller
{
    public function indexLogin()
    {
		if (Auth::user())
		{
			$manager = Manager::where('id', Auth::user()->id)->first();
			if ( $manager )
			{
				return redirect('/manage/dashboard');
			}
			return redirect('/');
		}

    	return view('auth.login');
    }

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

	public function log(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|min:3|max:255',
    		'password' => 'required|min:6|max:255',
    	]);

    	$username = $request->username;
    	$password = $request->password;

    	if ( Auth::attempt(['username' => $username, 'password' => $password], $request->remember_me ) )
    	{
    		if ( ManagerAuthPolicy::handle($username, $password) )
    		{
    			return redirect('/manage/dashboard');
    		}
    		return redirect('/');
    	}

    	return redirect('/login')->with('info', 'Your Credentials Doesn\' Match');
    }

	public function getSignup()
	{
		return view('auth.signup');
	}

	public function postSignup(Request $request)
	{
		$this->validate($request, [
			'first_name' => 'required|min:2|max:25',
			'last_name'  => 'required|min:2|max:25',
			'username'   => 'required|min:2|max:25|unique:users',
			'password'   => 'required|min:6|max:64',
			'email'		 => 'required|min:5|max:255|unique:users',
			'date_of_birth' => 'required',
		]);

		$user = new User;

		$user->first_name    = $request->first_name;
		$user->last_name     = $request->last_name;
		$user->username      = $request->username;
		$user->password      = bcrypt($request->password);
		$user->date_of_birth = $request->date_of_birth;

		$user->save();

		Auth::login($user, true);

		return redirect('/');
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}

}