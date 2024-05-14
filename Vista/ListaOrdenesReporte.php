<?php
session_start();
require_once "../Modelo/Conexion.php";
$periodo=$_GET['periodo'];
$fechaInicio = $_GET['fechainicio'];
$fechaTermino = $_GET['fechatermino'];
if($periodo==""||$periodo==null){
    $sql = "SELECT * FROM ordenestudio where  (fecha between '$fechaInicio' and '$fechaTermino') ";
}else{
    $fecha = date("Y-m-d");
    switch($periodo){
        case "dia":
            $sql = "SELECT * FROM ordenestudio where  (fecha = '$fecha') ";
            break;
        case "semana":
            $sql = "SELECT * FROM ordenestudio where  (SELECT WEEK('$fecha'))=(SELECT WEEK(ordenestudio.fecha)) ";
            break;
        case "mes":
            $sql = "SELECT * FROM ordenestudio where  (SELECT MONTH('$fecha'))=(MONTH (ordenestudio.fecha)) ";
            break;
    }
    
}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../Control/TablaReporte.js"></script>
    <title>Reporte</title>
</head>
<body>
<h3 id="titulo" class="d-none">Lista de Ordenes de estudio
    <?php 
    if($_GET['fechainicio']==""||$_GET['fechainicio']==null){
        switch($_GET['periodo']){
            case "mes": echo(" del mes");
            break;
            case "semana": echo(" de la semana");
            break;
            case "dia" : echo("del día");
            break;
        }
    } else{
        echo(" desde el ".$_GET['fechainicio']." hasta el ".$_GET['fechatermino']);
    }
    ?>
</h3>
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
            <td><?php echo($reg[0]) ?></td>
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
        </tr>
        <?php endwhile?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total pagado  <?php echo($totalPagado) ?></td>
            <td>Total por pagar  <?php echo($totalPorPagar) ?></td>
        </tr>
    </tfoot>
</table>
<a class="btn btn-info" href="ListaOrdenesReporte.php?periodo=<?php echo $_GET['periodo']?>&fechainicio=<?php echo $_GET['fechainicio']?>&fechatermino=<?php echo $_GET['fechatermino']?>" id="btnImprimir" class="btn btn-info">Ver en detalle</a>
</body>
</html>
