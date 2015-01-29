<?php

class Article extends \Eloquent {
	protected $fillable = ['title', 'body'];

	public static $rules = [
		 'title' => 'required',
		 'body' => 'required'
	];

}