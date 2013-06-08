<?php
return array(
	'title' => t('Please, enter your email'),
	'elements' => array(
		'email' => array(
			'type' => 'text',
			'maxlength' => 32,
		),
	),
	'buttons' => array(
		'login' => array(
			'type' => 'submit',
			'label' => t('Recover Password'),
			'class' => 'btn btn-primary btn-large'
		),
	),
);