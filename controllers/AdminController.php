<?php
/**
 * Created by PhpStorm.
 * User: эволюция
 * Date: 16.02.2019
 * Time: 17:50
 */

namespace app\controllers;

use app\models\Category;


class AdminController  extends AppController
{
    public $layout='admin/index';
    public function actionIndex()
    {
        //$cat=Category::find()->asArray()->all();
        //print_r($cat);
        return $this->render('index');
    }
}