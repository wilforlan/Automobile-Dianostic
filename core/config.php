<?php
require __DIR__ . "/class.logsys.php";
\Fr\LS::config(array(
  "db" => array(
    "host" => "localhost",
    "port" => 3306,
    "username" => "root",
    "password" => "",
    "name" => "automobile",
    "table" => "users"
  ),
  "features" => array(
    "auto_init" => true
  ),
  "pages" => array(
    "no_login" => array(
      "/",
      "/logSys/example-basic/reset.php",
      "/logSys/example-basic/register.php"
    ),
    "login_page" => "/admin/login",
    "home_page" => "/admin/index"
  )
));
