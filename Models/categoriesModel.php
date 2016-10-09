<?php

require 'core/C_Model.php';

class categoriesModel extends C_Model
{

  public function getPostsCats()
  {
    $cates = $this->connect()->from('posts')
                                   ->select(['cat_id'])
                                   ->all();
    return $cates;
  }
  public function getCatCount(){
    foreach ($this->getPostsCats() as $cats) {
      $cat_count = $this->connect()->from('categories')
                                ->orderBy('id', 'desc')
                                ->where('id')->is($cats['cat_id'])
                                 ->select()
                                 ->count();
      return $cat_count;
    }

  }
  public function getCates()
  {
      $categories = $this->connect()->from('categories')
                                ->orderBy('id', 'desc')
                                 ->select()
                                 ->all();
      return $categories;
  }
}
 ?>
