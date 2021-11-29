<?php

/** 
 * Controlador login
 */


if (!isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['pass']) || empty($_POST['pass'])) {
    header('Location:home.php');
    die();
}

include_once '../model/user.php';