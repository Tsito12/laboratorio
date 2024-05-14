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
    <script src="../Control/Resultados.js"></script>

</head>
<body >
    <div class="container mt-5" >
        <form action="" method="POST">

        
        <!--<p id="resultado"></p>-->
        <input type="text" class="d-none" id="aprobado" name="aprobado">
        <input type="text" class="d-none" id="idresultado" name="idresultado">
        <input type="text" class="d-none" id="idEstudio" name="idEstudio">
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
        <div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                
                <select name="idestudio" id="idestudio" class="form-control">
                    
                </select>
                <label class="form-label" for="idestudio">Estudio*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="parametro" name="parametro" class="form-control" required/>
                    <label class="form-label" for="parametro">Parametro medido*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="resultado" name="resultado" class="form-control" required/>
                    <label class="form-label" for="resultado">Resultado*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="unidad" name="unidad" class="form-control" required/>
                    <label class="form-label" for="uniadd">Unidad*</label>
                </div>
            </div>
        </div>

        <div class="row mt-2">    
        <div class="col">
                <div class="form-outline">
                
                <select name="valorReferencia" id="valorReferencia" class="form-control">
                    
                </select>
                <label class="form-label" for="valorReferencia">Valor de referencia*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="valorinicial" name="valorinicial" class="form-control" required disabled/>
                    <label class="form-label" for="valorinicial">Valor inicial</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="valorfinal" name="valorfinal" class="form-control" required disabled/>
                    <label class="form-label" for="valorfinal">Valor final</label>
                </div>
            </div>
            
            
        </div>

        <div class="row">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="nota" name="nota" class="form-control" required/>
                    <label class="form-label" for="nota">Nota</label>
                </div>
            </div>
        </div>

        <div class="row mt-2 align-items-center">
              <div class="col">
                  <div class="form-outline">
                    <input type="file" id="imagen1" name="imagen1" class="form-control"/>
                    <label class="form-label" for="imagen1">Imagen 1</label>
                  </div>
                </div>
                <div class="col d-flex justify-content-center">
                  <div class="form-outline">
                    <img class="img-responsive  " id="imgUsr1" src="" width="200" height="200" alt="Imagen de referencia del resultado">
                    <input type="text" name="rutaimg1" id="rutaimg1" class="d-none">
                  </div>
                </div>

                <div class="col">
                  <div class="form-outline">
                    <input type="file" id="imagen2" name="imagen2" class="form-control"/>
                    <label class="form-label" for="imagen2">Imagen 2</label>
                  </div>
                </div>
                <div class="col d-flex justify-content-center">
                  <div class="form-outline">
                    <img class="img-responsive  " id="imgUsr2" src="" width="200" height="200" alt="Imagen de referencia del resultado">
                    <input type="text" name="rutaimg2" id="rutaimg2" class="d-none">
                  </div>
                </div>

                <div class="row mt-2">
                <div class="col-auto">
                  <p>* Campos requeridos</p>
                </div>
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