<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array('first_name','last_name','email','password','create_at','updated_at');

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

	public function roles() {
	    return $this->belongsToMany('Role');
	}

	public function setPasswordAttribute($value) {
    $this->attributes['password'] = Hash::make($value);
	}

	####Methods###############################################

	public function isAdmin(){
		if ($this->roles()->first()->role_name == 'admin'){
			return true;
		}
		return false;
	}
	
	public function hasPermission($routeName){
		$routeName = explode(".", $routeName);
		$resourceName = $routeName[0];
		$actionName = $routeName[1];
		$user = $this;
		if (Authority::can($actionName, $resourceName, $user)){			
    	 return true;
		};
		return false;
	}



	public function hasRole($key)
	{
	  foreach ($this->roles as $role) {            
	      if ($role->role_name === $key) {
	          return true;
	      }
	  }        
	  return false;
	}   


}
