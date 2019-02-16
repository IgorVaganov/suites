<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Page;
use app\models\Myread;
use app\models\Category;


class SuitesController extends AppController
{
    public function hello(){
        echo 'hello';
    }
    //$this->hello();

    public function actionIndex()
    {
        //echo 'hello';
        Page::createmytable();//создание необходимых таблиц если их нет
        //print_r($_GET);
        return $this->render('index');
    }

    public function actionEvents()
    {
        $events=Myread::find()->all();
        return $this->render('events', compact('events'));
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
    public function actionAdmin()
    {
        return $this->render('admin');
    }
}
