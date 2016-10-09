<?php
require 'config.php';
require 'vendor/autoload.php';
use Opis\Database\Database;
use Opis\Database\Connection;

class C_Model
{

  public $db;
  public $host = 'localhost';
  public $username = 'root';
  public $password = '';
  public $dbname = 'automobile';

  public function connect()
  {


    $connection = new Connection("mysql:host=$this->host;dbname=$this->dbname", 'root', '');
    $db = new Database($connection);
    return $db;
  }



}
