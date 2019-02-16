<?php

use  app\models\Category;
class print_layout
{
   public function print_category(){
       $mycategory=Category::findBySql("SELECT * FROM category WHERE category_id=0")->asArray()->all();
       echo '
      <a href="/rooms">Комнаты</a>
      <ul class="dropdown arrow-top">';
           foreach ($mycategory as $category){
               $cat_chil=Category::findBySql("SELECT * FROM category WHERE category_id=".$category['id'])->asArray()->all();
               if(empty($cat_chil)){
                   echo '<li><a href="/rooms">'.$category['title'].'</a></li>';
               }else{
                   echo '
        <li class="has-children">
          <a href="/rooms">'.$category['title'].'</a>
          <ul class="dropdown">';
                   foreach ($cat_chil as $cat){
                       echo '<li><a href="/rooms">'.$cat['title'].'</a></li>';
                   }
                   echo '
          </ul>
        </li>';
               }

           }
           echo '</ul>';
   }
}