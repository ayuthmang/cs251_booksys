<?php
date_default_timezone_set('Asia/Bangkok');

error_reporting(E_ALL ^ E_NOTICE);
// session_save_path("/tmp");
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

//print_r($_SESSION);
// unset($_SESSION['C_ID']);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
// unset($_SESSION['C_TYPE']);
session_destroy();
//print_r($_SESSION);
header("Location: index.php");
