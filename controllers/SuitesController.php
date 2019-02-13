<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SuitesController extends AppController
{
    public function actionIndex()
    {
        //echo 'hello';
        return $this->render('index');
    }

    public function actionEvents()
    {
        return $this->render('events');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionRooms()
    {
        return $this->render('rooms');
    }
}
