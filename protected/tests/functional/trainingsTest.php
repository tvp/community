<?php

class trainingsTest extends WebTestCase
{
	public $fixtures=array(
		'trainings'=>'trainings',
	);

	public function testShow()
	{
		$this->open('?r=trainings/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=trainings/create');
	}

	public function testUpdate()
	{
		$this->open('?r=trainings/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=trainings/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=trainings/index');
	}

	public function testAdmin()
	{
		$this->open('?r=trainings/admin');
	}
}
