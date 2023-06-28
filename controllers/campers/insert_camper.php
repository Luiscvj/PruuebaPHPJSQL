<?php
include_once '../../app.php';
use Clases\Campers;

$_METHOD = $_SERVER["REQUEST_METHOD"];

$DATA = ($_METHOD == "POST" && count($_FILES))? array_merge($POST_,$FILES) :json_decode(file_get_contents('php://input'),true);
$objCamper =  new  Campers();


  $objCamper->postCamperData($DATA); 




?>