<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$controller->layout = '//layouts/admin';
			return true;
		}
		else
			return false;
	}
}
