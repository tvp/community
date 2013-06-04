<?php

class DashboardController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/profile';
        $this->render('index');
    }
}