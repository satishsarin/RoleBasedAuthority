<?php

class SessionsController extends \BaseController {

	
	public function create(){
		if (Auth::check()) return Redirect::to('/admin');
		return View::make("sessions.create");
	}

	public function store(){
		if(Auth::attempt(Input::only('email', 'password')))
		{
			$user = Auth::user(); //set the session
			if ($user-> isAdmin()){
				return Redirect::intended('admin');
			}
			return Redirect::route('articles.index');
		}
		return Redirect::back()->withInput()->withErrors('Username or Password are incorrect.');
	}

	public function destroy(){
		Auth::logout();
		return Redirect::route('sessions.create');
	}

}