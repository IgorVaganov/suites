<?php
/**
 * Created by PhpStorm.
 * User: эволюция
 * Date: 13.02.2019
 * Time: 21:54
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\db\Query; //для sql запроса

class Page extends ActiveRecord
{
   public function createmytable(){
       $query = new Query;
       if (\Yii::$app->db->getTableSchema('{{%myread}}', true) !== null) {//если таблица существует то ничего не делаем
           // какой-то код для работы с данной таблицей...
       }else{
           $table_myread=array(
               'id'=>'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
               'img'=>'TEXT(10000)',
               'text'=>'TEXT(100000)',
               'readdate'=>'DATE',
               'javascript'=>'TEXT(10000)',
               'text_from_html'=>'TEXT(100000)',
               'header'=>'TEXT(10000)',
               'descr'=>'TEXT(10000)',
               'category_id'=>'INT(6)',
           );
           $command = $query->createCommand()->createTable( 'myread', $table_myread, $options = null )->execute();
       }
       if (\Yii::$app->db->getTableSchema('{{%category}}', true) !== null) {//если таблица существует то ничего не делаем
           // какой-то код для работы с данной таблицей...
       }else{
           $table_myread=array(
               'id'=>'INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
               'img'=>'TEXT(10000)',
               'title'=>'TEXT(10000)',
               'text'=>'TEXT(100000)',
               'category_id'=>'INT(6)'
           );
           $command = $query->createCommand()->createTable( 'category', $table_myread, $options = null )->execute();
       }

   }

}