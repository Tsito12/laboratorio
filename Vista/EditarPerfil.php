<?php 
session_start();
require_once "nav2.php"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
        <link href="../bootstrap-5.0.2-dist\css\bootstrap-grid.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Editar perfil</title>
    <script src="../Control/EditarPerfil.js"></script>

</head>
<body>
    <div class="container mt-5">
        
        <p id="resultado"></p>
        <input type="text" class="d-none" id="idPerfil">
        <?php include "ListaPerfilesEditar.php" ?>
              <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2" class=" btn btn-outline-primary ">  Seleccionar Perfil </a>
        <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control"  required disabled/>
                    <label class="form-label" for="nombre">Nombre del perfil</label>
                  </div>
                </div>
                
              </div>
              <?php include "ListaEstudios.php" ?>
              <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalM" class=" btn btn-outline-primary ">  Lista de estudios </a>
        
        <div class="row">
          <div class="col">
            <div class="form-outline">
            <h3 class="">Estudios contenidos en el perfil</h3> 
            </div>
          </div>
          <div class="col d-flex justify-content-end">
            <div class="form-outline">
            <a id="guardarPerfil" class="btn btn-success">Guardar perfil</a>
            </div>
          </div>
        </div>
        <div ></div>
        <div id="tablaPerfil"></div>
                  
    </div>
    
</body>
</html>