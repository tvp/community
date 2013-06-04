<?php

class RequestsController extends Controller
{
    public function actionPending()
    {
        $model = User::model()->findAll();
        $this->render('index', array('model' => $model));
    }

    public function actionActive()
    {
        $model = User::model()->findAll();
        $this->render('index', array('model' => $model));
    }

    public function actionBlocked()
    {
        $model = User::model()->findAll();
        $this->render('index', array('model' => $model));
    }
}