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
    <title>Perfiles</title>
    <script src="../Control/Estudios.js"></script>

</head>
<body>
    <div class="container mt-5">
        
        <p id="resultado"></p>
        <input type="text" class="d-none" id="idPerfil">
        <?php include "ListaPerfiles.php" ?>
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
        <div class="table-responsibe">
                  <table id="estudiosP" class="table" id="responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nombre del estudio</th>
                      <th scope="col">Grupo</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Contenedor</th>
                      <th scope="col">Tiempo de procedimiento</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Accciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
    </div>
    
</body>
</html>