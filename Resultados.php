<?php
session_start();
require_once "Modelo/Conexion.php";
if($_GET['orden']==""||$_GET['orden']==null){
    header('location: Vista/Recepcion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <script src="jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>-->
   <!-- <script src="Control/Recibo.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="bootstrap-5.0.2-dist\js\bootstrap.min.js" ></script>
</head>
<body style="background-color: rgb(153, 204, 146);">
    <div class="container">

    <div class="row mt-5">
        <div class="col-6 d-flex align-content-end">
            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(XTrISztd_400x400.jpg);">
                <img src="XTrISztd_400x400.jpg" alt="logo" width="200" height="200">
            </div>
        </div>
        <div class="col d-flex align-content-end">
            <h2>Laboratorio de patología clínica Eduardo Pérez ortega</h2>
        </div>
    </div>
        
        <?php
            $d = new Conexion("localhost","laboratorio","acceso","Login01.");
            $idorden = $_GET['orden'];
            $sql = "SELECT * FROM resultado where idorden = $idorden and aprobado = 1";
            $res = $d->ejecutar($sql);
            if(!$res){
                printf("Errormessage: %s\n", mysqli_error($abr->getCon()));
                
            }
            if (mysqli_num_rows($res) > 0) {

            ?>
            <h3 class="mt-5">Resultados de estudios</h3>
            <table id="tablaResultados" class="table table-hover table-condensed table-bordered mt-5" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Estudio</th>
                        <th scope="col">Parametro</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Imagen 1 </th>
                        <th scope="col">Imagen 2</th>
                        <th scope="col">Valor inicial de referencia</th>
                        <th scope="col">Valor final de referencia</th>
                        <th scope="col">Nota</th>
                    </tr>
                </thead>
                <tbody>
            

            <?php
                while($row = mysqli_fetch_assoc($res)):
            ?>
                    <tr>
                        <td class="idestudio d-none"><?php echo $row['idorden']; ?></td>
                        <td>
                            <?php
                                $idestudio = $row['idorden'];
                                $sqlestudio ="SELECT * FROM `estudio` where idestudio = $idestudio;";
                                $result = $d->ejecutar($sqlestudio);
                                if(!$result){
                                    printf("Errormessage: %s %s\n", $sqlestudio,mysqli_error($d->getCon()));
                                }
                                $reg2 = mysqli_fetch_array($result);
                                echo($reg2[1]);

                            ?>
                        </td>
                        <td class="parametro"><?php echo $row['parametro']; ?></td>
                        <td class="resultado"><?php echo $row['resultado']; ?></td>
                        <td class="unidad"><?php echo $row['unidad']; ?></td>
                        <td class="img1 d-none"><?php echo($row['imagen1']); ?></td>
                        <td>
                            <img src="<?php echo("./".$row['imagen1']);?>" alt="" width="200" height="200">
                        </td>
                        <td class="img2 d-none"><?php echo($row['imagen2']) ; ?></td>
                        <td>
                            <img src="<?php echo("./".$row['imagen2']);?>" alt="" width="200" height="200">
                        </td>

                        <td class="valorinicial">
                            <?php 
                                $idvalor = $row['idvalorreferencia'];
                                $sqlvalor ="SELECT * FROM `valorreferencia` where idValorRef = $idvalor;";
                                $result2 = $d->ejecutar($sqlvalor);
                                if(!$result2){
                                    printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                                }
                                $reg3 = mysqli_fetch_array($result2);
                                echo($reg3[6]);
                                ?>
                        </td>
                        <td class="valorFinal">
                                <?php echo($reg3[7]); ?>
                        </td>
                        <td class="nota">
                                <?php echo($row['nota']); ?>
                        </td>


                        <td class="img1 d-none"><?php echo($row['nota']); ?></td>
                    </tr>
            <?php
            endwhile;
            ?>
                </tbody>
            </table>
            <!--<a class="btn btn-info" href="Vista/ResultadosPdf.php?orden=<?php //echo $_GET['orden']?>">Guardar pdf</a>-->
            <?php
            }else{
            ?>
            <h3>
                <?php echo("Los resultados para estos estudios no se han registrado aún, intente más tarde"); 
            }
            ?></h3>

    </div>
</body>
</html>