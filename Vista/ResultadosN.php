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
    <title>Ingresar Resultados</title>
    <script src="../Control/ResultadosN.js"></script>

</head>
<body >
    <div class="container mt-5" >
        <form action="" method="POST" id="form">

        
        <!--<p id="resultado"></p>-->
        <input type="text" class="d-none" id="aprobado" name="aprobado">
        <input type="text" class="d-none" id="idresultado" name="idresultado">
        <input type="text" class="d-none" id="idOrden" name="idOrden">
        <input type="text" class="d-none" id="idValor" name="idValor">
        <input type="text" class="d-none" id="accion" name="accion">
        <?php include "ListaOrdenes.php" ?>
              <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalO" class=" btn btn-outline-primary ">  Seleccionar Orden </a>
        <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="idorden" name="idorden" class="form-control"  required disabled/>
                    <label class="form-label" for="idorden">Orden*</label>
                  </div>
                </div>
                
        </div>
        
        <div id="datosOrden">

        </div>

        <div class="row mt-2">
            <div class="col-auto">
                <p>* Campos requeridos</p>
            </div>
        </div>

        

        
        </form>
        <div class=" col-auto">
                  <button id="guardarResultado" type="button" class="btn btn-success">Guardar</button>
                  
              </div>
              <hr>

              <h3>Resultados</h3>
              <div class="col-auto" id="tablaResultados">
              </div>
              </div>

              
        
</div>


        
        
    
</body>
</html>