<?php

require 'core/C_Controller.php';
require 'core/redirect.php';

use Redirect\Direct\Redirect;

class categoriesController extends C_Base
  {

  	private $modelObj;
  	private $model;

  	function __construct( $tile )
  	{
  		// $this->modelObj = $tile;
  		$this->model = new $tile;
  	}

  	public function index()
  	{

      Init::view('categories',array(
        'categories' => $this->model->getCates(),
        'count' => 'WIlliams'
      ));

  	}

    public function save()
    {
      $name = stripslashes($_POST['name']);
      $alias = htmlentities($_POST['alias']);
      $result = $this->model->connect()->insert(array(
                'name' => $name,
                'alias' => $alias
            ))
            ->into('categories');
      Redirect::to('cogentblog/categories');
    }


}
 ?>
