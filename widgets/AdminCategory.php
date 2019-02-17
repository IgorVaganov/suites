<?php
/**
 * Created by PhpStorm.
 * User: эволюция
 * Date: 17.02.2019
 * Time: 11:03
 */

namespace app\widgets;

use app\models\Category;

class AdminCategory
{
    public $count=1;

     public function print_cat($set=array()){
         if (!array_key_exists('category_id', $set)) {
             $set['category_id']=0;
         }
         if (!array_key_exists('accordion', $set)) {
             $set['accordion']=1;
         }
         //echo $this->count;
         //echo $set['category_id'];
         $mycategory=Category::findBySql("SELECT * FROM category WHERE category_id=".$set['category_id'])->asArray()->all();
         echo '<div class="panel-group myaccordion" id="accordion'.$set['accordion'].'"> ';
         foreach ($mycategory as $cat){
             $cat_chil=Category::findBySql("SELECT * FROM category WHERE category_id=".$cat['id'])->asArray()->all();
             if(empty($cat_chil)){
                 echo '
                        <div class="panel panel-default mypanel">
                            <div class="panel-heading myhead">
                                <h4 class="panel-title mytitle">
                                    <a class="myhref" data-toggle="collapse" data-parent="#accordion1" href="#collapse'.$cat['id'].'">'.$cat['title'].'</a>
                                </h4>
                            </div>
                            <div id="collapse'.$cat['id'].'" class="panel-collapse collapse in mycollaps">
                                <div class="panel-body mybody">В этой категории нет подкатегорий</div>
                            </div>
                        </div>
                       ';
             }else{
                 echo '
                        <div class="panel panel-default mypanel">
                            <div class="panel-heading myhead">
                                <h4 class="panel-title mytitle">
                                    <a class="myhref" data-toggle="collapse" data-parent="#accordion1" href="#collapse'.$cat['id'].'">'.$cat['title'].'</a>
                                </h4>
                            </div>
                            <div id="collapse'.$cat['id'].'" class="panel-collapse collapse in mycollaps">';
                 echo '       <div class="panel-body mybody">';
                                 $newset=array('category_id'=> $cat['id'], 'accordion'=> $cat['id']);
                                 $this->print_cat($newset); //рекурсия на эту же функцию
                 echo '       </div>';

                 echo '               
                            </div>
                        </div>
                       ';
             }

         }
         echo '</div>';
     }

}