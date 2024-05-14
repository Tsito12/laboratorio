<?php
session_start();
include_once "nav2.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
    <link href="../bootstrap-5.0.2-dist/css/bootstrap-grid.min.css" rel="stylesheet" >
    <title>Agregar Contenedores</title>
    <script src="../Control/Contenedor.js"></script>
</head>
<body style="background-color: rgb(127, 175, 175);">
<form method="POST" action="">

<div class="container mt-5">
<input class="d-none" type="text" id="id" name="id" class="form-control"/>
    <div class="row">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="nombre" name="nombre" class="form-control"  required/>
            <label class="form-label" for="nombre">Nombre del contenedor</label>
          </div>
        </div>
        
      </div>
      
      
      <input type="text" id="id" class="d-none">
      <input type="text" class="form-control d-none" id="accion" name="accion" required="guardar">
      <h6 id="resultado"></h6>
      <div class=" col-auto">
          <button id="Guardar" type="button" class="btn btn-success">Guardar</button>
         
      </div>


      <div class="row">
        <h3 class="text-center">Lista de contenedores</h3>
        <div id="tablaArea"></div>
      </div>
      

    </div>
</body>
</html>