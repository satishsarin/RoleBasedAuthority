<?php

  return array(

      'title' => 'Users',
      'single' => 'user',
      'model' => 'User',

      'columns' => array(
          'email' => array(
              'title' => 'Email',
          ),
          'first_name' => array(
              'title' => 'First Name',
          ),
          'last_name' => array(
            'title' => 'Last Name'
          ),
          'role_names' => array(
    				'title' => "Role Names",
    				'relationship' => 'roles', //this is the name of the Eloquent relationship method!
    				'select' => "(:table).role_name",
					)
      ),

      'edit_fields' => array(
          'email' => array(
              'title' => 'Email',
          ),
          'first_name' => array(
              'title' => 'FirstName',
          ),
          'last_name' => array(
            'title' => 'Last Name'
          ),
			    'roles' => array(
			      'type' => 'relationship',
			      'title' => 'Roles',
			      'name_field' => 'role_name', 
			    ),
          'password' => array(
              'title' => 'Password',
              'type' => 'password',
          ),
      ),
  );
