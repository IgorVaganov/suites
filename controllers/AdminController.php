<?php
/**
 * Created by PhpStorm.
 * User: эволюция
 * Date: 16.02.2019
 * Time: 17:50
 */

namespace app\controllers;


class AdminController  extends AppController
{
    public $layout='admin/index';
    public function actionIndex()
    {

        return $this->render('index');
    }
}