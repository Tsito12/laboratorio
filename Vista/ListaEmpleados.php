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
    <title>Lista de empleados</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
    <link href="../bootstrap-5.0.2-dist/css/bootstrap-grid.min.css" rel="stylesheet" >
    <script src="../Control/Empleados.js"></script>
</head>
<body style="background-color: rgb(127, 175, 175);">
    <div class="container mt-5">
    <div class="row">
        <h3 class="text-center">Lista de Empleados</h3>
        <div id="tablaArea" class="table-responsive">
            <?php
            require_once "../Modelo/Conexion.php";
            session_start();
            $accion = $_POST['accion'];
            $user = $_SESSION['user'];
            $pass= $_SESSION['pass'];
            $d = new Conexion("localhost","laboratorio",$user,$pass);
            ?>
            <input type="text" class="d-none" id="id">

            <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <!-- nombre, apellidoP, apellidoM, edad, periodoedad, sexo, 
               telefono, email, rfc, imagen, estatura, peso, idtipocliente, idcuenta, calle, colonia, 
               poblacion, municipio, estado, codigoPostal, nombref, correof, domf, pobf, telefonof, 
               codigopostalf -->
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql ="SELECT * FROM `empleado` ORDER BY nombre;";
                    $res = $d->ejecutar($sql);
                    if(!$res){
                        printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                    }
                    while($reg = mysqli_fetch_array($res))://while ($ver=mysqli_fetch_row($result)):
                    ?>
                    <tr>
                        <td class="id"><?php echo $reg[0]; ?></td>
                        <td class="nombre"><?php echo $reg[1]; ?></td>
                        <td class="apellidoP"><?php echo $reg[2]; ?></td>
                        <td class="apellidoM"><?php echo $reg[3]; ?></td>
                        <td class="telefono"><?php echo $reg[4]; ?></td>
                        <td class="rfc"><?php echo $reg[5]; ?></td>
                        <td class="puesto"><?php echo $reg[6]; ?></td>
                        <?php
                            $idcuenta = $reg[7];
                            $sql ="SELECT * FROM `cuenta` where idcuenta = $idcuenta;";
                            $res2 = $d->ejecutar($sql);
                            if(!$res2){
                                printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                            }
                            $cuenta = mysqli_fetch_array($res2)
                        ?>
                        <td class="cuenta"><?php echo $cuenta[1]; ?></td>
                        <td class="password"><?php echo $cuenta[2]; ?></td>

                        <td>
                            <a class="btn btn-warning" onclick="editar(this)" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                            <a class="btn btn-danger" onclick="eliminar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Borrar</a>
                        </td>
                    </tr>
                    <?php endwhile?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
</body>
</html>