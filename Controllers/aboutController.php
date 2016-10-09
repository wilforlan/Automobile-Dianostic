<?php
require 'core/C_Controller.php';

class AboutController extends C_Base
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
		Print "I am the about Page";
	}


	public function about($name)
	{
		echo 'Hello ' . $name[0];

	}
	public function save()
	{

		$data = json_encode($_POST);
		echo $data;


	}
	public function post()
	{

			$data = $_POST;
			Init::view('post', array('posts' => $data));


	}

	public function say()
	{
		Init::view('about', array('schools' => $this->model->schools(), 'users' => $this->model->users()));



	}
}
