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
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
    <link href="../bootstrap-5.0.2-dist/css/bootstrap-grid.min.css" rel="stylesheet" >
    <title>Reportes</title>
    <script src="../Control/Reportes.js"></script>
</head>
<body style="background-color: rgb(127, 175, 175);">
<div class="container mt-5">
<div class="row">
    <div class="col">
        <h3 class="mt-2">Reportes financieros</h3>
    </div>
</div>



<input class="d-none" type="text" id="id" name="id" class="form-control"/>
    
<div class="container border">
<h4 class="mt-2">Ordenes de estudio sin liquidar</h4>
<div class="row mt-5">
    
            <div class="col">
                <h5>Lista de ordenes de estudio sin liquidar por periodo</h5>
            </div>
            <div class="col">
                <div class="form-outline">
                    <select name="periodo" id="periodo" class="form-control">
                        <option value="dia">Día</option>
                        <option value="semana">Semana</option>
                        <option value="mes">Mes</option>
                    </select>
                    <label class="form-label" for="periodo"></label>
                </div>
            </div>
            <div class="col">
                <a class="btn btn-info" id="select" onclick="tablaReporte(this)">Buscar</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h5>Lista de ordenes de estudio sin liquidar entre fechas especificas</h5>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="date" name="fechainicio" id="fechainicio" class="form-control">
                    <label class="form-label" for="fechainicio">Fecha de inicio</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="date" name="fechatermino" id="fechatermino" class="form-control">
                    <label class="form-label" for="fechatermino">Fecha final</label>
                </div>
            </div>
            <div class="col">
                <a class="btn btn-info" id="fechas" onclick="tablaReporte(this)">Buscar</a>
            </div>
        </div>
</div>
<div class="containter border">
<h4 class="mt-2">Total de Ordenes de estudio</h4>
<div class="row mt-5">
    
            <div class="col">
                <h5>Lista de ordenes de estudio por periodo</h5>
            </div>
            <div class="col">
                <div class="form-outline">
                    <select name="periodoT" id="periodoT" class="form-control">
                        <option value="dia">Día</option>
                        <option value="semana">Semana</option>
                        <option value="mes">Mes</option>
                    </select>
                    <label class="form-label" for="periodoT"></label>
                </div>
            </div>
            <div class="col">
                <a class="btn btn-info" id="selectT" onclick="tablaReporteT(this)">Buscar</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h5>Lista de ordenes de estudio entre fechas especificas</h5>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="date" name="fechainicioT" id="fechainicioT" class="form-control">
                    <label class="form-label" for="fechainicioT">Fecha de inicio</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="date" name="fechaterminoT" id="fechaterminoT" class="form-control">
                    <label class="form-label" for="fechaterminoT">Fecha final</label>
                </div>
            </div>
            <div class="col">
                <a class="btn btn-info" id="fechasT" onclick="tablaReporteT(this)">Buscar</a>
            </div>
        </div>
</div>
        
      
      
      

      <div class="row">
        <h3 class="text-center"></h3>
        <div id="tablaReporte"></div>
      </div>
      

    </div>
</body>
</html>