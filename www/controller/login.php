<?php

/** 
 * Controlador login
 */


if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['pass']) || empty($_POST['pass'])) {
    header('Location:home.php');
    die();
}

include_once '../model/user.php';
$user = new UserModel(NULL,NULL,NULL,$_POST['email'],$_POST['pass']);

$user_ok= $user->login();

if($user_ok){
    header('Location:../../index.php');
}