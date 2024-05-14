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
    <title>Lista de clientes</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="../bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
    <link href="../bootstrap-5.0.2-dist/css/bootstrap-grid.min.css" rel="stylesheet" >
    <script src="../Control/Clientes.js"></script>
</head>
<body style="background-color: rgb(127, 175, 175);">
    <div class="container mt-5">
    <div class="row">
        <h3 class="text-center">Lista de clientes</h3>
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
                        <th scope="col">Edad</th>
                        <th scope="col">Periodo </th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Estatura</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Tipo de cliente</th>
                        <th scope="col">Calle</th>
                        <th scope="col">Colonia</th>
                        <th scope="col">Poblacion</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Codigo postal</th>
                        <th scope="col">Nombre o razón social</th>
                        <th scope="col">Email de facturacion</th>
                        <th scope="col">Domicilo fiscal</th>
                        <th scope="col">Poblacion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">C.P</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql ="SELECT * FROM `cliente` ORDER BY nombre;";
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
                        <td class="edad"><?php echo $reg[4]; ?></td>
                        <td class="periodoE d-none"><?php echo($reg[5]); ?></td>
                        <td>
                            <?php 
                                switch($reg[5]){
                                    case "years": echo("Años");
                                    break;
                                    case "months": echo("Meses");
                                    break;
                                    case "days": echo("Días");
                                    break;
                                }
                                //echo $reg[5]; 
                            ?>
                        </td>

                        <td class="sexo d-none"><?php echo($reg[6]); ?></td>
                        <td>
                            <?php 
                                //$reg[6]=='M'?echo("Masculino"):echo("Femenino"); 
                                if($reg[6]=='M'){
                                    echo("Masculino");
                                } if($reg[6]=='F'){
                                    echo("Femenino");
                                }
                            ?>
                        </td>
                        <td class="telefono"><?php echo $reg[7]; ?></td>
                        <td class="email"><?php echo $reg[8]; ?></td>
                        <td class="rutmaimg d-none"><?php echo $reg[10]; ?></td>
                        <td class="img"><img src="../<?php echo $reg[10]; ?>" alt="" width="50" height="50"></td>
                        <td class="estatura"><?php echo $reg[11]; ?></td>
                        <td class="peso"><?php echo $reg[12]; ?></td>
                        <td class="idtipoc d-none"><?php echo $reg[13]; ?></td>
                        <td class="tipoc">
                            <?php 
                                $idtc = $reg[13];
                                $sqltipoc = "SELECT * FROM tipocliente where idtipocliente=$idtc";
                                $resultado = $d->ejecutar($sqltipoc);
                                if(!$resultado){
                                    printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                                }
                                $filas = mysqli_fetch_array($resultado);
                                echo $filas[1]; 
                            ?>
                        </td>
                        <td class="calle"><?php echo $reg[15]; ?></td>
                        <td class="colonia"><?php echo $reg[16]; ?></td>
                        <td class="poblacion"><?php echo $reg[17]; ?></td>
                        <td class="municipio"><?php echo $reg[18]; ?></td>
                        <td class="estado"><?php echo $reg[19]; ?></td>
                        <td class="codigopostal"><?php echo $reg[20]; ?></td>
                        <td class="razonf"><?php echo $reg[21]; ?></td>
                        <td class="emailf"><?php echo $reg[22]; ?></td>
                        <td class="domf"><?php echo $reg[23]; ?></td>
                        <td class="pobf"><?php echo $reg[24]; ?></td>
                        <td class="telefonof"><?php echo $reg[25]; ?></td>
                        <td class="cpf"><?php echo $reg[26]; ?></td>


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