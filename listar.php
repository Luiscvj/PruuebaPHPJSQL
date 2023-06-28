<?php
include_once 'app.php'

?>

<?php 

include_once __DIR__ . '/templates/header.php';

include_once __DIR__ .  '/templates/navbar.php';

include_once __DIR__ . '/templates/sidebar.php';
?>

<!-- MAIN --------------------- -->
    	
   <?php
   use Clases\Pais;
   use Clases\Departamento;
   use Clases\Region;
   use Clases\Campers;
   $objPais = new Pais();
   $dataPais= $objPais->getAllPais();
   $objDep = new Departamento();
   $dataDep  = $objDep->getAllDepartamento();
   $objReg= new Region();
   $dataReg  = $objReg->getAllRegion();
    $objCamper = new Campers();
$dataCamper = $objCamper->getAllCampers()
   
   
   
   ?>    
       
       
       
       



<div class="container mt-3 text-center">
    <div class="card">
        <h5 class="card-header text-center">Camper</h5>
        <div class="card-body">
            
                <div class="container">

                 <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre </th>
                        <th scope="col">Apellido</th>
                        <th scope="col">region</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col"></th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataCamper as $key){?>
                        <tr>
                        <th scope="row">1</th>
                        <td><?php echo $key['nombreCamper']?></td>
                        <td><?php echo $key['apellidoCamper']?></td>
                        <td><?php echo $key['idReg']?></td>
                        <td><?php echo $key['fechaNac']?></td>
                        <td>
                         <button id="<?php echo $key['idCamper']?>"  class="btn btn-danger ElminarCamper"> Eliminar</button> 
                         <button  id="<?php echo $key['idCamper']?>" class="btn btn-secondary EditarCamper" > Editar </button>
                        </td>
                       
                       
                        <?php  }?>
                    </tbody>
             </table>



                </div>
            
        </div>
    </div>
</div>


<!-- MAIN------------- -->

<?php 

include_once __DIR__ . '/templates/footer.php'

?>



