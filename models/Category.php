<?php
/**
 * Created by PhpStorm.
 * User: эволюция
 * Date: 16.02.2019
 * Time: 16:09
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
      public function hello(){
          $console='category';
          return $console;
      }
}