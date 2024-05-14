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
        <title>Recepcion</title>
        <script src="../Control/Recepcion.js"></script>
        <script src="../Control/ActualizarCosas.js"></script>
    </head>
    <body style="background-color: rgb(127, 175, 175);">



        <form method="POST" action="">

        <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3>Recepcion</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <h5><?php echo date("d/m/Y  h:m"); ?></h2>
            </div>
        </div>  

        <input class="d-none" type="text" id="fecha" name="fecha" class="form-control" value="<?php echo(date("Y-m-d"))?>"/>
        <input class="d-none" type="text" id="idcliente" name="idcliente" class="form-control"/>
        <input class="d-none" type="text" id="idempleado" name="idempleado" value="<?php echo($_SESSION['idempleado'])?>" class="form-control"/>
        <div id="modalClientes">

        </div>
        <?php //include "ListaClientesRecepcion.php" ?>
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalM" onclick="cargarModalClientes()" class=" btn btn-outline-primary ">  Lista de clientes </a>
                        <a href="#" onclick="esperarCliente()" class="btn btn-info">Agregar nuevo cliente</a>
                        <hr>
                        <h5>Datos del cliente</h5>
            <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombreCliente" name="nombreCliente" class="form-control"  disabled/>
                    <label class="form-label" for="nombreCliente">Nombre</label>
                    
                    </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="apellidoP" name="apellidoP" class="form-control"  disabled/>
                    <label class="form-label" for="apellidoP">Apellido paterno</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="apellidoM" name="apellidoM" class="form-control"  disabled/>
                    <label class="form-label" for="apellidoM">Apellido materno</label>
                  </div>
                </div>
              </div>
              
              <hr>
              <h5>Datos médicos</h5>

              <div id="modalMedicos">

              </div>
              <?php //include "ListaDoctoresRecepcion.php" ?>
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalD" onclick="cargarModalDoctores()" class=" btn btn-outline-primary ">  Lista de médicos </a>
                        <a  class="btn btn-info" onclick="esperarMedico()">Agregar nuevo médico</a>
              <div class="row mt-2">
              <input type="text" id="iddoctor" name="iddoctor" class="form-control d-none" />
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombreMedico" name="nombreMedico" class="form-control" disabled/>
                    <label class="form-label" for="nombreMedico">Nombre del  médico</label>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="diagnostico" name="diagnostico" class="form-control"/>
                    <label class="form-label" for="diagnostico">Diagnóstico</label>
                  </div>
                </div>
              </div>

              <div class="row mt-2">
                
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="observaciones" name="observaciones" class="form-control"/>
                    <label class="form-label" for="observaciones">Observaciones</label>
                  </div>
                </div>
              </div>

              <hr>
              <?php include "ListaEstudiosRecepcion.php" ?>
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalE" class=" btn btn-outline-primary ">  Lista de estudios </a>
              
                <div class="row mt-2">
                
                <div class="col-1">
                  <div class="form-outline">
                    <input type="text" id="idestudio" name="idestudio" class="form-control"/>
                    <label class="form-label" for="idestudio">Codigo</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-outline">
                    <input type="text" id="nombreestudio" name="nombreestudio" class="form-control" disabled/>
                    <label class="form-label" for="nombreestudio">Nombre del estudio</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-outline">
                    <input type="text" id="tipo" name="tipo" class="form-control" disabled/>
                    <label class="form-label" for="tipo">Tipo</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-outline">
                    <input type="text" id="contenedor" name="contenedor" class="form-control" disabled/>
                    <label class="form-label" for="contenedor">Contenedor</label>
                  </div>
                </div>
                <div class="col-1">
                  <div class="form-outline">
                    <button class="btn btn-success" type="button" id="agregarEstudio" onclick="agregarDeId()">Agregar</button>
                  </div>
                </div>
              </div>
                    
                    <h3>Estudios</h3>

              <div id="tablaEstudios" class="table-responsive">
                <table class="table table-hover" id="tablaRecepcion">
                    <thead class="thead-dark">
                        <tr>
                            <th>id</th>
                            <th>Nombre del estudio</th>
                            <th>Tipo</th>
                            <th>Grupo</th>
                            <th>Contenedor</th>
                            <th>Tipo de muestra</th>
                            <th>Tiempo de procedimiento</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="tablaConEstudios">

                    </tbody>
                </table>
              </div>

              <div class="row">
                <h5 id="totalH">Total:</h5>
                <input type="text" name="total" id="total" class="d-none">
              </div>
              
              <hr/>
              <input type="text" class="form-control d-none" id="accion" name="accion" required="guardar">
              <h6 id="resultado"></h6>
              <div class=" col-auto">
                  <button id="btnPagar" data-bs-toggle="modal" data-bs-target="#exampleModalP"  type="button" class="btn btn-success">Pagar</button>
                  
              </div>

              <div  class="modal fade" id="exampleModalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 id="tituloModal" class="modal-title" id="exampleModalLongTitle"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row text-center justify-content-center">
            
            <div class="row mt-2">
                
                <div class="col">
                  <div class="form-outline">
                    <select name="metodopago" id="metodopago" class="form-control" onchange="ocultarCambio()">
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta</option>
                    </select>
                    <label class="form-label" for="metodopago">Metodo de pago</label>
                  </div>
                  <div class="col">
                  <div class="form-outline">
                  <input type="number" id="pago" name="pago" class="form-control" required/>
                    <label class="form-label" for="pago">Cantidad a pagar</label>
                  </div>
                </div>
                </div>
            <div class="row mt-2" id="filaEfectivo">
                
                
                <div class="col">
                  <div class="form-outline">
                  <input type="number" id="recibido" name="recibido" class="form-control" onkeyup="darCambio()" required/>
                    <label class="form-label" for="recibido">Efectivo recibido</label>
                  </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="text" name="cambio" class="form-control" id="cambio" disabled>
                      <label class="form-label" for="cambio">Cambio</label>
                    </div>
                </div>

              </div>
              <button id="guardarOrden" type="button" class="btn btn-success">Guardar orden</button>

        </div>
                
                </div>
            </div>
        </div>
    </div>
</div>


            </div>

            

        </form>
    </body>

    
</html>