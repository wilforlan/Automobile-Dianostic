<?php

require 'core/C_Model.php';

class IndexModel extends C_Model
{
  public function getPosts($id = '')
  {

    if ($id == '') {
      $posts = $this->connect()->from('posts')
                                ->join('categories', function($join){
                                            $join->on('cat_id', 'categories.id');
                                         })
                                ->orderBy('posts.id', 'desc')
                               ->select()
                               ->all();

      return $posts;
    }
    else {
      $posts = $this->connect()->from('posts')
                              ->where('posts.id')->is($id)
                                ->join('categories', function($join){
                                            $join->on('cat_id', 'categories.id');
                                         })
                                ->orderBy('posts.id', 'desc')
                               ->select()
                               ->all();

      return $posts;
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

  public function getComments()
  {
      $comments = $this->connect()->from('comments')
                                 ->select()
                                 ->all();
      return $comments;
  }

}
 ?>
