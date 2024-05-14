<?php

require_once "nav2.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Menú principal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
        <link href="../bootstrap-5.0.2-dist\css\bootstrap-grid.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="background-color: #beebf4">
        <div class="container mt-5">

            <div class="row">
                <?php
                if($_SESSION['user']=="directoroperativo"||$_SESSION['user']=="laboratorio"){
                ?>

            
                <div class="form-group col-12 col-md-4 text-center">
                    <a href="form.php">
                        <img src="../img/external-lab-covid19-phatplus-lineal-color-phatplus.png"/>
                        <p>Estudios</p>
                    </a>
                </div>
                <?php
                } else{ ?>
                <div class="form-group col-12 col-md-4 text-center">
                    <a href="Estudios.php">
                        <img src="../img/external-lab-covid19-phatplus-lineal-color-phatplus.png"/>
                        <p>Estudios</p>
                    </a>
                </div>

                <?php
                }
                ?>

                <div class="form-group col-12 col-md-4 text-center">
                    <a href="Recepcion.php">
                        <img src="../img/check-in-desk.png"/>
                        <p>Recepcion</p>
                    </a>
                </div>
                <div class="form-group col-12 col-md-4 text-center">
                    <a href="Clientes.php">
                        <img src="../img/external-customers-basic-ui-elements-2.4-sbts2018-flat-sbts2018.png"/>
                        <p>Clientes</p>
                    </a>
                </div>
            </div>
            
            <div class="row">

            <?php
            if($_SESSION['user']=="directoroperativo"){
            ?>

            
                <div class="form-group col-12 col-md-4 text-center">
                    <a href="IngresarResultados.php">
                        <img src="../img/external-results-design-thinking-phatplus-lineal-color-phatplus.png"/>
                        <p>Resultados</p>
                    </a>
                </div>

            


                
                <div class="form-group col-12 col-md-4 text-center">
                    <a href="Reportes.php">
                        <img src="../img/external-reports-productivity-flaticons-lineal-color-flat-icons.png"/>
                        <p>Reportes financieros</p>
                    </a>
                </div>

            <?php
            }
            ?>
                <div class="form-group col-12 col-md-4 text-center">
                    <a href="Doctores.php">
                        <img src="../img/doctor.png" width="160" height="160"/>
                        <p>Medicos asociados</p>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>