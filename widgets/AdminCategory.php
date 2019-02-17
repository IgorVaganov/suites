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
                 echo '
                        <div class="panel panel-default mypanel">
                            <div class="panel-heading myhead">
                                <div class="panel-title mytitle row">
                                    <a contenteditable="true" class="myhref col-md-8" data-toggle="collapse" data-parent="#accordion1" href="#collapse'.$cat['id'].'">'.$cat['title'].'</a>
                                    <div class="col-md-4">
                                       <div class="icon_act delet_cat material-icons" data-tippy="Удалить категории и все подкатегории">delete_sweep</div>
                                       <div class="icon_act creat_cat material-icons" data-tippy="Добавить новую категорию">add_circle_outline</div>
                                       <div class="icon_act read_cat material-icons" data-tippy="Изменить название категории">create</div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse'.$cat['id'].'" class="panel-collapse collapse in mycollaps">';
                 echo '       <div class="panel-body mybody">';
                                 if(empty($cat_chil)){
                                     echo 'В этой категории нет подкатегорий';
                                 }else{
                                     $newset=array('category_id'=> $cat['id'], 'accordion'=> $cat['id']);
                                     $this->print_cat($newset); //рекурсия на эту же функцию
                                 }

                 echo '       </div>';

                 echo '               
                            </div>
                        </div>
                       ';

         }
         echo '</div>';
     }

}