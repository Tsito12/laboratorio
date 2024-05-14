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
    <title>Historial de clientes</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
    <link href="../bootstrap-5.0.2-dist\css\bootstrap-grid.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../Control/HistorialClientes.js"></script>
</head>
<body style="background-color: rgb(127, 175, 175);">
    



<div class="container mt-5">
<div class="row">
    <div class="col">
        <h3>Historial de clientes</h3>
    </div>
</div>  


<input class="d-none" type="text" id="idcliente" name="idcliente" class="form-control"/>

<?php include "ListaClientesRecepcion.php" ?>
    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalM" class=" btn btn-outline-primary ">  Lista de clientes </a>

    <hr>
    <div id="tablaHistorial">

    </div>

                
</div>
</body>
</html>