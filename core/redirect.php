<?php
namespace Redirect\Direct;

class Redirect {

    function __construct()
    {

    }

    public static function To($page)
    {
    header('Location:/'.$page);
    }
}

 ?>
