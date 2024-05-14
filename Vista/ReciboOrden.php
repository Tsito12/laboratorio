<?php
session_start();
include_once "../Modelo/Conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>-->
    <script src="../Control/Recibo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
        

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h6 class="d-none" id="idestudio"><?php echo($_SESSION['idorden'])?></h6>
                
                <h6>Folio no.<?php   echo($_SESSION['idorden'])      ?> </h6>
            </div>
            <div class="col">
                <h6 id="fecha"></h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6>Datos del cliente</h6>
                
                <h6 id="nombreCliente"></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <h6>Por parte del doctor: </h6>
            </div>
            <div class="col d-flex justify-content-start">
                <h6 id="nombreDoctor"></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <h6>Diagnóstico: </h6>
            </div>
            <div class="col">
                <h6 id="diagnostico"></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <h6>Observaciones: </h6>
            </div>
            <div class="col">
                <h6 id="observaciones"></h6>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h6>Estudios</h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="tablaEstudios" class="table table-responsive ">
                    <table class="table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre del estudio</th>
                                <th>Tipo</th>
                                <th>Grupo</th>
                                <th>Contenedor</th>
                                <th>Tipo de muestra</th>
                                <th>Tiempo de procedimiento</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody id="tablarecibo">
                        <?php
                            $idorden = $_SESSION['idorden'];
                            $user = $_SESSION['user'];
                            $pass= $_SESSION['pass'];
                            $d = new Conexion("localhost","laboratorio",$user,$pass);
                            $sql = "SELECT * FROM detalleorden as d inner join estudio as e 
                                    on d.idestudio = e.idestudio where idorden = $idorden";
                            $result = $d->ejecutar($sql);
                            $idcliente = 0;
                            $idempleado = 0;
                            if (mysqli_num_rows($result) > 0) :
                                while($row = mysqli_fetch_assoc($result)):


                            
                        ?>
                            <tr>
                                <td><?php echo($row['nombre'])?></td>
                                <td><?php echo($row['tipo'])?></td>
                                <?php
                                    $idgrupo = $row['grupo'];
                                    $consulta2 = "SELECT * from grupo where idGrupo = $idgrupo";
                                    $res = $d->ejecutar($consulta2);
                                    if(!$res){
                                        printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                                    }
                                    $reg = mysqli_fetch_array($res);
                                ?>
                                <td><?php echo($reg[1]); ?></td>
        
                                <?php
                                    $idcontenedor = $row['contenedor'];
                                    $consulta3 = "SELECT * from contenedor where idContenedor = $idcontenedor";
                                    $res2 = $d->ejecutar($consulta3);
                                    if(!$res2){
                                        printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                                    }
                                    $reg2 = mysqli_fetch_array($res2);
                                ?>
                                <td><?php echo($reg2[1]); ?></td>
                                <td><?php echo($row['tipoMuestra'])?></td>
                                <td><?php echo($row['tiempoProced'])?> hrs</td>
                                <td><?php echo($row['precio'])?></td>
                            </tr>
                            <?php
                            endwhile;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <h6>Total</h6>
            </div>
            <div class="col">
                <h6 id="total"></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <h6>Pagado</h6>
            </div>
            <div class="col">
                <h6 id="pago"></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <h6>Restante a pagar</h6>
            </div>
            <div class="col">
                <h6 id="restante"></h6>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-6">
                <h6 id="msg"></h6>
            </div>
            
        </div>

        <div class="row mt-2">
            <div class="col-2">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_ADDR"]."/Laboratorio/Resultados.php?orden=".$_SESSION["idorden"])?>&amp;size=100x100" alt="" title="" />
            </div>
            <div class="col">
                <h6 id="restante"></h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 id="alt"></h6>
            </div>
            
        </div>


    </div>
</body>
</html>