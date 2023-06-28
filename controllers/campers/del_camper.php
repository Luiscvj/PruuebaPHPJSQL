<?php 
include_once '../../app.php';
use Clases\Campers;


if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    
    $objCAmper = new Campers();
    $objCAmper->delCamper($_GET['id']);


}else{

    echo "La solicitud no se ha realizado";
}







?>