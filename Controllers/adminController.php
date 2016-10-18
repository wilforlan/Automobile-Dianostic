<?php

require 'core/C_Controller.php';
require 'core/redirect.php';
require 'core/Auth.php';
// require 'Models/categoriesModel.php';

use Redirect\Direct\Redirect;

class AdminController extends C_Base
  {

  	private $modelObj;
  	private $model;
    public $cat;

  	function __construct( $tile )
  	{
      // $this->Model('categoriesModel');
  		$this->model = new $tile;
  	}

  	public function index()
  	{
      Init::view('admin/index',array(
        'clients' => $this->model->getClients()
        // 'receipt' => $this->model->countReceipt()
      ));
  	}

    public function login()
    {
      Init::view('login');
      \Fr\LS::init();
    }

    public function logout()
    {
      \Fr\LS::logout();
    }

    public function updatePosts($id){
      Init::view('updatepost', array(
        'posts' => $this->model->getPosts($id[0])
      ));
    }

    public function save()
    {
      $name = stripslashes($_POST['customer_name']);
      $location = $_POST['location'];
      $mobile = htmlentities($_POST['mobile']);
      $vehicle_type = stripslashes($_POST['vehicle_type']);
      $license_number = $_POST['license_number'];
      $date_issued = htmlentities($_POST['date_issued']);
      $engine_number = stripslashes($_POST['engine_number']);
      $chasis_number = $_POST['chasis_number'];
      $year_purchased = htmlentities($_POST['year_purchased']);
      $state_purchased = stripslashes($_POST['state_purchased']);
      $result = $this->model->connect()->insert(array(
                'name' => $name,
                'location' => $location,
                'mobile' => $mobile,
                'vehicle_type' => $vehicle_type,
                'license_number' => $license_number,
                'date_issued' => $date_issued,
                'engine_number' => $engine_number,
                'chasis_number' => $chasis_number,
                'year_purchased' => $year_purchased,
                'state_purchased' => $state_purchased
            ))
            ->into('clients');
      Redirect::to('admin/index');
    }

    public function faults()
    {
      Init::view('faults', array(
        'faults' => $this->model->getFaults(),
      ));
    }



    public function saveFaults()
    {
      $folderName = "uploads";
      if (isset($_FILES))
      {
        move_uploaded_file($_FILES["file_upload"]["tmp_name"], getcwd() . "/" . $folderName . "/" . $_FILES["file_upload"]["name"]);
        move_uploaded_file($_FILES["file_upload2"]["tmp_name"], getcwd() . "/" . $folderName . "/" . $_FILES["file_upload2"]["name"]);
        move_uploaded_file($_FILES["file_upload3"]["tmp_name"], getcwd() . "/" . $folderName . "/" . $_FILES["file_upload3"]["name"]);
        move_uploaded_file($_FILES["file_upload4"]["tmp_name"], getcwd() . "/" . $folderName . "/" . $_FILES["file_upload4"]["name"]);
        $filename = $_FILES["file_upload"]["name"];
        $filename1 = $_FILES["file_upload2"]["name"];
        $filename2 = $_FILES["file_upload3"]["name"];
        $filename3 = $_FILES["file_upload4"]["name"];
        $nature = $_POST['nature'];
        $faults = htmlentities($_POST['faults']);
        $solution = stripslashes($_POST['solution']);
        $result = $this->model->connect()->insert(array(
                  'nature_of_fault' => $nature,
                  'possible_fault' => $faults,
                  'probable_solution' => $solution,
                  'picture' => $filename,
                  'picture2' => $filename1,
                  'picture3' => $filename2,
                  'picture4' => $filename3
              ))
              ->into('diagnosis');
        Redirect::to('admin/faults');
      }
    }

    public function diagnosis()
    {
      Init::view('diagnosis', array(
        'errors' => $this->model->getFaults(),
        'customers' => $this->model->getClients()
      ));
    }

    public function searchDiagnosis()
    {
      if (isset($_POST['faults'])) {
        $faults = $_POST['faults'];
        $client = $_POST['client'];
        $result = $this->model->connect()->insert(array(
                  'fault_id' => $faults,
                  'client_id' => $client,
                ))
                ->into('receipts');
        Init::view('diagnosis', array(
          'results' => $this->model->getFaultsById($faults),
          'clients' => $this->model->getClientsById($client),
          'errors' => $this->model->getFaults(),
          'customers' => $this->model->getClients()
        ));

      }
      else {
        Init::view('diagnosis', array(
          'errors' => $this->model->getFaults(),
          'customers' => $this->model->getClients()
        ));
      }


    }
    public function receipt($val){
      Init::view('receipt', array(
        'results' => $this->model->getFaultsById($val[1]),
        'clients' => $this->model->getClientsById($val[0]),
      ));

    }

}
 ?>
