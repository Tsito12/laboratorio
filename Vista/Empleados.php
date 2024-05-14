<?php 
session_start();
require_once "nav2.php"

?>

<!DOCTYPE html>
<html>
    <head>
    <script src="../jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
        <link href="../bootstrap-5.0.2-dist\css\bootstrap-grid.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Agregar Empleados</title>
        <script src="../Control/Empleados.js"></script>
    </head>
    <body style="background-color: rgb(127, 175, 175);">



        <form method="POST" action="">

        <div class="container mt-5">
          <h3>Datos generales</h3>
        <input class="d-none" type="text" id="id" name="id" class="form-control"/>
            <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="soloLetras()" required/>
                    <label class="form-label" for="nombre">Nombre del empleado*</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="apellidoP" name="apellidoP" class="form-control" onkeypress="soloLetras()" required/>
                    <label class="form-label" for="apellidoP">Apellido paterno*</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="apellidoM" name="apellidoM" class="form-control" onkeypress="soloLetras()" />
                    <label class="form-label" for="apellidoM">Apellido materno</label>
                  </div>
                </div>
              </div>
              
              

              <div class="row mt-2">
                
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="telefono" name="telefono" class="form-control" onchange="alertTelefono()" required/>
                    <label class="form-label" for="telefono">Telefono*</label>
                  </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="rfc" name="rfc" class="form-control" onchange="alertRFC()" required/>
                      <label class="form-label" for="rfc">RFC*</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="puesto" name="puesto" class="form-control" required/>
                      <label class="form-label" for="puesto">Puesto*</label>
                    </div>
                </div>
              </div>

              <hr>
              <h3>Cuenta de acceso al sistema</h3>
              <div class="row mt-2">
                
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="usuario" name="usuario" class="form-control" onchange="alertUser()" required/>
                    <label class="form-label" for="usuario">Nombre de usuario*</label>
                  </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="password" id="password" name="password" class="form-control" onchange="alertPass()" required/>
                      <label class="form-label" for="password">Contraseña*</label>
                    </div>
                </div>

              </div>
              <div class="row mt-2">
                <div class="col-auto">
                  <p>* Campos requeridos</p>
                </div>
              </div>
              <hr/>
              <input type="text" class="form-control d-none" id="accion" name="accion" required="guardar">
              <h6 id="resultado"></h6>
              <div class=" col-auto">
                  <button id="guardarEmpleado" type="button" class="btn btn-success">Guardar</button>
                  <a href="ListaEmpleados.php" class="btn btn-info">Lista de empledos</a>
              </div>

            </div>

            

        </form>
    </body>

    
</html>