<?php
$config = array(
	'signup' => array(
		array(
		'field' => 'username',
		'label' => 'Username',
		'rules' => 'required'
		),
		array(
		'field' => 'password',
		'label' => 'Password',
		'rules' => 'required'
		),
		array(
		'field' => 'passconf',
		'label' => 'PasswordConfirmation',
		'rules' => 'required'
		),
		array(
		'field' => 'email',
		'label' => 'Email',
		'rules' => 'required'
		)
	),
	'email' => array(
		array(
		'field' => 'emailaddress',
		'label' => 'EmailAddress',
		'rules' => 'required|valid_email'
		),
		array(
		'field' => 'name',
		'label' => 'Name',
		'rules' => 'required|alpha'
		),
		array(
		'field' => 'title',
		'label' => 'Title',
		'rules' => 'required'
		),
		array(
		'field' => 'message',
		'label' => 'MessageBody',
		'rules' => 'required'
		)
	)                          
);