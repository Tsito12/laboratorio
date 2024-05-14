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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
        <link href="../bootstrap-5.0.2-dist\css\bootstrap-grid.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../Control/Estudios.js"></script>
    <title>Lista de estudios</title>
</head>
<body style="background-color: rgb(127, 175, 175);">
    
       <div class="container mt-3">
       <div class="row text-center justify-content-center">
            <div class="col-6"><input id="buscar" class="form-control" type="text" name="Buscar" onkeyup="buscarTabla()" placeholder="Buscar estudio"></div>
        </div>
        <div class="d-none">
          <form >
            
          <input type="text" id="id" name="id" class="form-control" required/>
          <input type="text" id="nombre" name="nombre" class="form-control" required/>
          <input type="text" id="grupo" name="grupo" class="form-control" required/>
          <input type="text" id="tipo" name="tipo" class="form-control" required/>
          <input type="text" id="contenedor" name="contenedor" class="form-control" required/>
          <input type="text" id="area" name="area" class="form-control" required/>
          <input type="text" id="tipomuestra" name="tipomuestra" class="form-control" required/>
          <input type="text" id="metodo" name="metodo" class="form-control" required/>
          <input type="number" id="tiempo" name="tiempo" class="form-control" required/>
          <input type="number" id="precio" name="precio" class="form-control" required/>
          <input type="text" id="estado" name="estado" />
          <input type="text" class="form-control d-none" id="accion" name="accion" required>
          </form>
        </div>
        <p id="resultado"></p>
       <h3 class="">Lista de estudios</h3>
                  <div class="table-responsibe">
                  <table id="tabla" class="table" id="responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre del estudio</th>
                      <th scope="col">Area</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Contenedor</th>
                      <th scope="col">Grupo</th>
                      <th scope="col">Tipo de muestra</th>
                      <th scope="col">Método</th>
                      <th scope="col">Unidad</th>
                      <th scope="col">Tiempo de procedimiento</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Observaciones</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Accciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    require_once "../Modelo/Conexion.php";
                    $user = $_SESSION['user'];
                    $pass= $_SESSION['pass'];
                    $d = new Conexion("localhost","laboratorio",$user,$pass);
                    $estudios = $d->getEstudios();
                    foreach($estudios as $e){
                      echo("<tr>");
                      echo("<td class=\"codigo\">".$e->getIdEstudio()."</td>");
                      echo("<td class=\"nombre\" >".$e->getNombreEstudio()."</td>");
                      echo("<td class=\"area\">".$e->getArea()."</td>");
                      echo("<td class=\"tipo\">".$e->getTipo()."</td>");
                      //echo("<td class=\"contenedor\">".$e->getContenedor()."</td>");
                      $idContenedor = $e->getContenedor();
                      $consulta = "SELECT * from contenedor where idContenedor = $idContenedor";
                      $res = $d->ejecutar($consulta);
                      if(!$res){
                          printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                      }
                      $reg = mysqli_fetch_array($res);
                      echo("<td class=\"contenedor d-none\">".$reg[0]."</td>");
                      echo("<td >".$reg[1]."</td>");
                      //echo("<td class=\"area\">".$e->getArea()."</td>");
                      $idGrupo = $e->getGrupo();
                      $consulta2 = "SELECT * from grupo where idGrupo = $idGrupo";
                      $res = $d->ejecutar($consulta2);
                      if(!$res){
                          printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                      }
                      $reg = mysqli_fetch_array($res);
                      echo("<td class=\"grupo d-none\">".$reg[0]."</td>");
                      echo("<td >".$reg[1]."</td>");
                      echo("<td class=\"tipoMuestra\">".$e->getTipoMuestra()."</td>");
                      echo("<td class=\"metodo\">".$e->getMetodo()."</td>");
                      echo("<td class=\"unidad\">".$e->getUnidad()."</td>");
                      echo("<td class=\"tiempo\">".$e->getTiempo()."</td>");
                      echo("<td class=\"precio\">".$e->getPrecio()."</td>");
                      echo("<td class=\"observaciones\">".$e->getObservaciones()."</td>");
                      echo("<td class=\"estadoE d-none\">".$e->getEstado()."</td>");
                      echo("<td class=\"estado\"><input type=\"checkbox\" id=\"estadoE\" value=\"1\" name=\"estado\"/></td>");
                      
                      echo("<td><a  class=\"btn btn-warning\" onclick=\"editar(this)\"  ><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</a>
                      <a   class=\"btn btn-danger\" onclick=\"eliminar(this)\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Borrar</a>
                      </td>");
                      echo("</tr>");
                    }
                    ?>
                  </tbody>
       </div>
</body>
</html>