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
        <title>Agregar Estudios</title>
        <script src="../Control/Estudios.js"></script>
    </head>
    <body style="background-color: rgb(127, 175, 175);">



        <form method="POST" action="">

        <div class="container mt-5">
        <input class="d-none" type="text" id="id" name="id" class="form-control"/>
            <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="soloLetrasParentesis()" required/>
                    <label class="form-label" for="nombre">Nombre del estudio*</label>
                  </div>
                </div>
                
              </div>
              
              
              <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <select name="grupo" id="grupo" class="form-control">
                    <?php
                            require_once "../Modelo/Conexion.php";
                            $user = $_SESSION['user'];
                            $pass= $_SESSION['pass'];
                            $d = new Conexion("localhost","laboratorio",$user,$pass);
                            $sql ="SELECT * FROM `grupo`;";
                            $res = $d->ejecutar($sql);
                            if(!$res){
                                printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                            }
                            while($reg = mysqli_fetch_array($res)):
                                
                            
                            ?>
                            <option value="<?php  echo($reg[0])?>"><?php echo($reg[1]);?></option>
                            <?php endwhile ?>
                    </select>
                    <label class="form-label" for="grupo">Grupo*</label>
                  </div>
                </div>


                <div class="col">
                  <div class="form-outline">
                    <select class="form-control" name="tipo" id="tipo">
                      <option value="prueba">Prueba</option>
                      <option value="perfil">Perfil</option>
                    </select>
                    <label class="form-label" for="tipo">Tipo*</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                  <select name="contenedor" id="contenedor" class="form-control">
                    <?php
                            require_once "../Modelo/Conexion.php";
                            $user = $_SESSION['user'];
                            $pass= $_SESSION['pass'];
                            $d = new Conexion("localhost","laboratorio",$user,$pass);
                            $sql ="SELECT * FROM `contenedor`;";
                            $res = $d->ejecutar($sql);
                            if(!$res){
                                printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                            }
                            while($reg = mysqli_fetch_array($res)):
                                
                            
                            ?>
                            <option value="<?php  echo($reg[0])?>"><?php echo($reg[1]);?></option>
                            <?php endwhile ?>
                    </select>
                    <label class="form-label" for="contenedor">Contenedor*</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="area" name="area" onkeypress="soloLetras()" class="form-control"/>
                    <label class="form-label" for="area">Área</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="tipomuestra" name="tipomuestra" class="form-control" onkeypress="soloLetras()" required/>
                    <label class="form-label" for="tipomuestra">Tipo de muestra*</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="metodo" name="metodo" class="form-control" onkeypress="soloLetras()" required/>
                    <label class="form-label" for="metodo">Método</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-outline">
                    <input type="number" id="tiempo" name="tiempo" class="form-control" onkeydown="numerosPunto()" required/>
                    <label class="form-label" for="tiempo">Tiempo de procedimiento*</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="number" id="precio" name="precio" class="form-control" onkeydown="numerosPunto()" required/>
                    <label class="form-label" for="precio">Precio*</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="checkbox" id="estado" value="1" name="estado" class="mt-3" />
                    <label class="form-label" for="estado">Activado</label>
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
                    <input type="text" id="observaciones" name="observaciones" class="form-control" required/>
                    <label class="form-label" for="observaciones">Observaciones</label>
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
                  <button id="Guardar" type="button" class="btn btn-success">Guardar</button>
                  <a href="Estudios.php" class="btn btn-info">Lista de estudios</a>
                  <a href="Perfiles.php" class="btn btn-info">Crear perfil</a>
              </div>

            </div>

            

        </form>
    </body>

    
</html>