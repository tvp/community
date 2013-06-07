<?php
return array(
	'title' => t('Please, login'),
	'elements' => array(
		'email' => array(
			'type' => 'text',
			'maxlength' => 32,
		),
		'password' => array(
			'type' => 'password',
			'maxlength' => 32,
		),
	),
	'buttons' => array(
		'login' => array(
			'type' => 'submit',
			'label' => t('Login'),
			'class' => 'btn btn-primary btn-large'
		),
	),
);