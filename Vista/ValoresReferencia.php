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
    <title>Valores de referencia</title>
    <script src="../Control/ValoresReferencia.js"></script>

</head>
<body >
    <div class="container mt-5" >
        <form action="" method="POST">

        
        <p id="resultado"></p>
        <input type="text" class="d-none" id="idEstudio" name="id">
        <input type="text" class="d-none" id="idValor" name="idValor">
        <input type="text" class="d-none" id="accion" name="accion">
        <?php include "ListaEstudiosVR.php" ?>
              <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalM" class=" btn btn-outline-primary ">  Seleccionar Estudio </a>
        <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control"  required disabled/>
                    <label class="form-label" for="nombre">Estudio*</label>
                  </div>
                </div>
                
        </div>
        <div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                
                <select name="sexo" id="sexo" class="form-control">
                    <option value="General">General</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    
                </select>
                <label class="form-label" for="sexo">Sexo*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="number" id="edadinicial" name="edadinicial" onchange="alertEdad()" onkeypress="soloNumeros()" class="form-control" required/>
                    <label class="form-label" for="edadinicial">Edad inicial*</label>
                </div>
            </div>
            <div class="col ">
                <div class="form-outline">
                    <select class="form-control" name="periodoinicial" onchange="alertEdad()" id="periodoinicial">
                      <option value="years">Años</option>
                      <option value="months">Meses</option>
                      <option value="days">Días</option>
                    </select>
                    <label class="form-label" for="periodoinicial">Periodo inicial*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="number" id="edadfinal" name="edadfinal" onchange="alertEdad()" class="form-control" onkeypress="soloNumeros()" required/>
                    <label class="form-label" for="edadfinal">Edad Final*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                <select class="form-control" name="periodofinal" onchange="alertEdad()" id="periodofinal">
                      <option value="years">Años</option>
                      <option value="months">Meses</option>
                      <option value="days">Días</option>
                    </select>
                    <label class="form-label" for="periodofinal">Periodo final*</label>
                </div>
            </div>
        </div>

        <div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                <input type="text" id="descripcion" name="descripcion" class="form-control" required/>
                <label class="form-label" for="descripcion">Descripción*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="valorinicial" name="valorinicial" class="form-control" onchange="alertValores()" required/>
                    <label class="form-label" for="valorinicial">Valor inicial*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="valorfinal" name="valorfinal" onchange="alertValores()" class="form-control" required/>
                    <label class="form-label" for="valorfinal">Valor final*</label>
                </div>
            </div>
        </div>

        <div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                <input type="text" id="unidad" name="unidad" class="form-control" required/>
                <label class="form-label" for="unidad">Unidad*</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="number" id="alturainicial" name="alturainicial" onchange="altertAltura()" onkeypress="numerosPunto()" class="form-control" required/>
                    <label class="form-label" for="alturainicial">Altura inicial</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="number" id="alturafinal" name="alturafinal" class="form-control" onchange="altertAltura()" onkeypress="numerosPunto()" required/>
                    <label class="form-label" for="alturafinal">Altura final</label>
                </div>
            </div>
        </div>

        <div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                <input type="text" id="nota" name="nota" class="form-control" />
                <label class="form-label" for="nota">Nota</label>
                </div>
            </div>
        </div>
        </form>
        <div class=" col-auto">
                  <button id="guardarValor" type="button" class="btn btn-success">Guardar</button>
                  
              </div>

              <div class="row mt-2">
                <div class="col-auto">
                  <p>* Campos requeridos</p>
                </div>
              </div>
              <hr>
              <h3>Valores de referencia</h3>
              <div id="tablaValores" class="table-responsive">

              </div>
        
</div>


        
        
    
</body>
</html>