<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        $user = User::model()->findAll();
        $this->layout = '//layouts/profile';
        $this->render('index', array('model' => $user));
    }
}