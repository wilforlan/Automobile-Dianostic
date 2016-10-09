<?php


class C_Base{


    function __construct()
    {

    }

    public function helper(String $name)
    {
      $helper = require 'core/helpers/'.$name.'.php';
      return $helper;
    }
    public function Model($name){
      $model = file_get_contents('models/'.$name.'.php');

      return $model;
    }

    
}
