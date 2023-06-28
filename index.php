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
   $objPais = new Pais();
   $dataPais= $objPais->getAllPais();
   $objDep = new Departamento();
   $dataDep  = $objDep->getAllDepartamento();
   $objReg= new Region();
   $dataReg  = $objReg->getAllRegion();

   
   
   
   ?>    
       
       
       
       
       <!--Form de Pais-->
       <div class="container mt-3 text-center">
    <div class="card">
        <h5 class="card-header text-center">Camper</h5>
        <div class="card-body">
            
                <div class="container">
                    <div class="row bg-light p-1">
                                <div class="col">
                                    <label  class="form-label">Pais </label>i
                                    <select type="text" id="pais" class="form-control"  name="nombrePais">
                                 
                                    <option value="" selected>Elige su Pais</option>
                                    <?php  foreach($dataPais as $key){?>
                                    <option value="<?php echo  $key['idPais']?>" selected><?php echo $key['nombrePais']?></option>

                                                <?php
                                                }
                                                    ?>
                                    </select>
                                </div> 


                                <div class="col">
                                    <label  class="form-label">Departamento </label>i
                                    <select type="text" id="departamento" class="form-control"  name="nombreDep">
                                   
                                    <option value="" selected>Elige su Departamento</option>
                                    <?php  foreach($dataDep as  $key){?>
                                    <option value="<?php echo  $key['idDep']?>" selected><?php echo $key['nombreDep']?></option>

                                        <?php
                                        }
                                            ?>
                             </select>
                                </div> 

                                <form id="formCamper">

                                <div class="col">
                                    <label  class="form-label">Region </label>
                                    <select type="text" id="region" class="form-control"  name="idReg">
                                    <?php  foreach($dataReg as $key){?>
                                    <option value="<?php echo  $key['idReg']?>" selected><?php echo $key['nombreReg']?></option>

                                        <?php
                                        }
                                            ?>
                                    </select>
                                </div> 

                                <div class="col">
                                    <label  class="form-label">Nombre Camper</label>
                                    <input type="text" class="form-control"  name="nombreCamper">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Apellido</label>
                                    <input type="text" class="form-control"  name="apellidoCamper" maxlength="40">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Documento</label>
                                    <input type="text" class="form-control"  name="idCamper">
                                </div>

                                <div class="col">
                                    <label  class="form-label">Fecha de Nacimiento</label>
                                    <input type="Date" class="form-control" name="fechaNac" >
                                </div>
                    </div>
                </div>
                <div class="container text-center bg-light p-1">
                    <button type="submit" class="btn btn-success" id="btnPais">GUARDAR</button>
                </div>
                </form>
            
        </div>
    </div>
</div>
       





<!-- MAIN------------- -->

<?php 

include_once __DIR__ . '/templates/footer.php'

?>



