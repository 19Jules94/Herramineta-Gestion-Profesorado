<?php

/** 
 * Controlador login
 */


if (!isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['pass']) || empty($_POST['pass'])) {
    header('Location:home.php');
    die();
}else{
    include '../scripts/db.php';
   $base = new DB;
   $base->__construct();
   
}
