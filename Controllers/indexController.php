<?php

require 'core/C_Controller.php';
require 'core/redirect.php';
// require 'Models/categoriesModel.php';

use Redirect\Direct\Redirect;

class IndexController extends C_Base
  {

  	private $modelObj;
  	private $model;
    public $cat;

  	function __construct( $tile )
  	{
  		// $this->modelObj = $tile;
      $this->Model('categoriesModel');
  		$this->model = new $tile;

  	}

  	public function index()
  	{

      Init::view('index',array(
        'posts' => $this->model->getPosts(),
        'cats' => $this->model->getCates(),
        'comments' => $this->model->getComments()
      ));

  	}

    public function updatePosts($id){
      Init::view('updatepost', array(
        'posts' => $this->model->getPosts($id[0])
      ));
    }



    public function save()
    {
      $title = stripslashes($_POST['title']);
      $catId = $_POST['category'];
      $content = htmlentities($_POST['content']);
      $result = $this->model->connect()->insert(array(
                'title' => $title,
                'content' => $content,
                'cat_id' => $catId
            ))
            ->into('posts');
      Redirect::to('cogentblog/index');
    }
    public function saveComment()
    {
      $post = stripslashes($_POST['post_id']);
      $comment = $_POST['comment'];
      $content = htmlentities($_POST['content']);
      $result = $this->model->connect()->insert(array(
                'post_id' => $post,
                'comment' => $comment
            ))
            ->into('comments');
      Redirect::to('cogentblog/index');
    }


    public function upload()
    {
    $this->helper('fileupload');
      // $file = new FileUpload\FileUpload();
      // $file ->setDestinationDirectory( "uploads" );
      //       $file->setUploadFunction("copy");
      //       $file->setCallbackOutput(function( $data )
      //       {
      //       	echo "<h3>End!</h3>";
      //       	if( $data->status === true )
      //       	{
      //       		// echo "<p>The ".$data->filename." file is upload</p>";
      //           Init::view('upload',array('filename' => $data->filename, 'success' => 'success' ));
      //       	}else{
      //           Init::view('upload',array('filename' => $data->filename, 'error' => 'error' ));
      //       		// echo "<p>The ".$data->filename." file could not be uploaded to the server</p>";
      //       	}
      //       });
      //       $file->save();
      Init::view('upload');
    }

}
 ?>
