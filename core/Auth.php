<?php


class Auth
{

  public static function getAuth()
  {
    $auth = require('config.php');
    return $auth;
  }
}
 ?>
