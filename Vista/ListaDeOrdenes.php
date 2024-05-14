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
    <title>Lista de ordenes</title>
    <script src="../Control/Ordenes.js"></script>
</head>
    <body style="background-color: rgb(127, 175, 175);">
    <form action="">
        <input type="text" id="idorden" name="idorden" class="d-none">
        <input type="text" id="faltante" name="faltante" class="d-none">
        <input type="text" id="accion" name="accion" class="d-none">
    </form>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h3 class="mt-2">Ordenes de estudio</h3>
                </div>
            </div>

            <div id="tablaOrdenes">
            <table class="table table-responsive">
    <thead>
        <tr>
            <th>Codigo de orden</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Pagado hasta el momento</th>
            <th>Restante por pagar</th>
            <th>Empleado que realizó la orden</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include_once "../Modelo/Conexion.php";
            $sql = "SELECT * FROM ordenestudio";
            $totalPagado = 0;
            $totalPorPagar = 0;
            $user = $_SESSION['user'];
            $pass= $_SESSION['pass'];
            $d = new Conexion("localhost","laboratorio",$user,$pass);
            $res = $d->ejecutar($sql);
            if(!$res){
                printf("Errormessage: %s %s \n",$sql , mysqli_error($d->getCon()));
            }
            while($reg = mysqli_fetch_array($res)):
        ?>
        <tr>
            <?php
            $totalPagado+=$reg[6];
            $porPagar = $reg[9]-$reg[6];
            $totalPorPagar+=$porPagar;
            ?>
            <td class="idorden"><?php echo($reg[0]) ?></td>
            <td><?php echo($reg[1]) ?></td>
            <td>
                <?php
                    $idcliente = $reg[8];
                    $sqlcliente = "SELECT * FROM cliente where idcliente = $idcliente";
                    $error = $d->ejecutar($sqlcliente);
                    if(!$error){
                        printf("Errormessage: %s %s \n",$sqlcliente , mysqli_error($d->getCon()));
                    }
                    $reg2 = mysqli_fetch_array($error);
                    echo($reg2[1]." ".$reg2[2]." ".$reg2[3]);
                ?>
            </td>
            <td><?php echo($reg[9]) ?></td>
            <td><?php echo($reg[6]) ?></td>
            <td class="faltante"><?php echo($porPagar) ?></td>
            <td>
                <?php
                    $idempleado = $reg[4];
                    $sqlempleado = "SELECT * FROM empleado where idempleado = $idempleado";
                    $error2 = $d->ejecutar($sqlempleado);
                    if(!$error2){
                        printf("Errormessage: %s %s \n",$sqlempleado , mysqli_error($d->getCon()));
                    }
                    $reg3 = mysqli_fetch_array($error2);
                    echo($reg3[1]." ".$reg3[2]." ".$reg3[3]);
                ?>
            </td>
            <td>
                <?php
                if($porPagar==0){
                    ?>
                    <td>Ya liquidado</td>
                <?php
                }else{
                    ?>
                    <td><a class="btn btn-success" onclick="liquidar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Liquidar</a></td>
                <?php
                }
                
                ?>

            </td>
        </tr>
        <?php endwhile?>
    </tbody>
            </div>
      

        </div>
    </body>
</html>