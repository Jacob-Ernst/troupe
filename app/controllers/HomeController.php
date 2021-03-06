<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function showHome()
	{
		if(Auth::check()){
			$performances = Performance::orderBy('date', 'ASC')->paginate(6);
		
			return View::make('home')->with('performances', $performances);
		}
		else{
			return View::make('landing');
		}
		
	}
	
	public function doLogin()
	{
		$email = strtolower(Input::get('email'));
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		    Session::flash('successMessage', 'Logged in');
		    return Redirect::intended('/');
		} else {
			Session::flash('errorMessage', 'Could not login');
			return Redirect::action('HomeController@showHome')->withInput();
		}
	}
	
	public function doLogout()
	{
		Auth::logout();
		return Redirect::action('HomeController@showHome');
	}
	
	public function showAdmin()
	{	
		if (Auth::user()->role == 'organizer' || Auth::user()->role == 'admin') 
		{
			return View::make('admin');
		}
		else 
		{
			return Redirect::action('HomeController@showHome');
		}
	}
}
