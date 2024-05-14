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
        <title>Agregar Médicos</title>
        <script src="../Control/Doctores.js"></script>
    </head>
    <body style="background-color: rgb(127, 175, 175);">



        <form method="POST" action="">

        <div class="container mt-5">
        <input class="d-none" type="text" id="id" name="id" class="form-control"/>
            <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="soloLetras()" required/>
                    <label class="form-label" for="nombre">Nombre del médico*</label>
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
                    <input type="text" id="apellidoM" name="apellidoM" class="form-control" onkeypress="soloLetras()" required/>
                    <label class="form-label" for="apellidoM">Apellido materno</label>
                  </div>
                </div>
              </div>
              
              

              <div class="row mt-2">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="email" name="email" class="form-control" onchange="alertEmail()" required/>
                        <label class="form-label" for="metodo">Correo Electrónico</label>
                    </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="telefono" name="telefono" class="form-control" onchange="alertTelefono()" required/>
                    <label class="form-label" for="telefono">Telefono</label>
                  </div>
                </div>
              </div>
              <hr>
              <h3>Ubicación del consultorio</h3>
              <div class="row mt-2">
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="calle" name="calle" class="form-control" required />
                      <label class="form-label" for="calle">Calle</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="colonia" name="colonia" class="form-control"  />
                      <label class="form-label" for="colonia">Colonia</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="poblacion" name="poblacion" class="form-control"  />
                      <label class="form-label" for="poblacion">Poblacion</label>
                    </div>
                </div>

              </div>

              <div class="row mt-2">
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="municipio" name="municipio" class="form-control"  />
                      <label class="form-label" for="municipio">Municipio</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                    <select name="estado" id="estado" class="form-control">
                        <option value=""></option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Lius Potosí">San Lius Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                        <option value="Otro">Otro</option>
                      </select>
                      <label class="form-label" for="estado">Estado</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="codigopostal" name="codigopostal" onkeypress="codigoPostal()" class="form-control"  />
                      <label class="form-label" for="codigopostal">Codigo postal</label>
                    </div>
                </div>

              </div>
              <div class="row mt-2">
                <div class="col">
                    <div class="form-outline justify-content-end d-flex align-items-center">
                        <input type="checkbox" id="convenio" value="1" name="convenio" class="mt-3 from-control" />
                        <label class="form-label mt-3" for="convenio">Convenio</label>
                  </div>
                </div>
                <div id="fechaConvenio" class="col">
                    <input type="date" name="fechaconvenio" id="fechaconvenio" class="form-control">
                    <label for="fechaconvenio">Fecha del convenio</label>
                </div>
              </div>

              <hr>
              <h3>Datos de facturación</h3>
              <div class="row mt-2">
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="razonf" name="razonf" class="form-control"/>
                      <label class="form-label" for="razonf">Nombre o razón fiscal</label>
                    </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                    <div class="form-outline">
                      <input type="text" id="rfc" name="rfc" onchange="alertRFC()" class="form-control"/>
                      <label class="form-label" for="rfc">RFC</label>
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
                  <button id="guardarDoctor" type="button" class="btn btn-success">Guardar</button>
                  <a href="ListaDoctores.php" class="btn btn-info">Lista de médicos</a>
              </div>

            </div>

            

        </form>
    </body>

    
</html>