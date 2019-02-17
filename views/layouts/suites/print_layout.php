<?php

use  app\models\Category;
class print_layout
{
   public function print_cat($set=array()){
       if (!array_key_exists('category_id', $set)) {
           $set['category_id']=0;
       }
       $mycategory=Category::findBySql("SELECT * FROM category WHERE category_id=".$set['category_id'])->asArray()->all();

       echo '
      <ul class="dropdown">'; // arrow-top
       foreach ($mycategory as $cat){
           $cat_chil=Category::findBySql("SELECT * FROM category WHERE category_id=".$cat['id'])->asArray()->all();
           if(empty($cat_chil)){
               echo '<li><a href="/rooms">'.$cat['title'].'</a></li>';
           }else{
               echo '
        <li class="has-children">
          <a href="/rooms">'.$cat['title'].'</a>';
               $newset=array('category_id'=> $cat['id']);
               //echo '<li><a href="/">'.$cat['id'].'</a></li>';
               $this->print_cat($newset); //рекурсия на эту же функцию
               echo
        '</li>';
           }
       }

echo '</ul>';


   }
}