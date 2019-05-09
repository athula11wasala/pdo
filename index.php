<?php


include_once "libs/Bootstrap.php";

 if (!isset($_SERVER['PATH_INFO']))
    {
   //  require_once('views/index/login.php');
 header('Location:/mvc/index/index');
    }
    else{
         new Bootstrap();
    }
    

