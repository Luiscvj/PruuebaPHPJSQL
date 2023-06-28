<?php 
 require_once 'vendor/autoload.php';

use App\Database;
 use Clases\Pais;
use Clases\Region; 
use Clases\Departamento;
use Clases\Campers;

$objDatabase = new Database();
$conn = $objDatabase->getConnection('mysql');

Departamento::setConn($conn);
Pais::setConn($conn);
Region::setConn($conn);
Campers::setConn($conn);

$obj = new Campers();





?> 