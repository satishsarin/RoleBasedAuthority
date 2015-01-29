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
	
	public function hasRole($key)
	{
	  foreach ($this->roles as $role) {            
	      if ($role->role_name === $key) {
	          return true;
	      }
	  }        
	  return false;
	}   

	public function hasPermission($resourceName){
		$permissions = $this->roles()->first()->permissions;
		$permissions_name =  array_pluck($permissions, 'resource');
		if (in_array($resourceName, $permissions_name, true)) {
    	 return true;
		}
		return false;
	}

}
