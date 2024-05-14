<?php

session_start();
require_once "../Modelo/Conexion.php";
$idcliente = $_GET['idcliente'];
$sql = "SELECT * FROM ordenestudio where idcliente = $idcliente";
?>

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
            <td class="codigo"><?php echo($reg[0]) ?></td>
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
            <td><?php echo($porPagar) ?></td>
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
            <td><a class="button btn btn-info" onclick="resultadosOrden(this)">Resultados</a></td>
        </tr>
        <?php endwhile?>
    </tbody>
</table>