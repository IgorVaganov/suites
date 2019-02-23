<?php
/**
 * Created by PhpStorm.
 * User: эволюция
 * Date: 16.02.2019
 * Time: 17:50
 */

namespace app\controllers;

use app\models\Category;
use Yii;


class AdminController  extends AppController
{
    public $layout='admin/index';
    public function actionIndex()
    {
        //$cat=Category::find()->asArray()->all();
        //print_r($cat);
        return $this->render('index');
    }

    public function ajax(){
        $ajax=new Category();
        $console=$ajax->hello();
        return $console;
    }
}
//$ajax_print=new AdminController();
//$console_print=$ajax_print->ajax();
$console_print='hello 445';