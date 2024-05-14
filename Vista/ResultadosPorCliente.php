<?php

session_start();
require_once "../Modelo/Conexion.php";
$idcliente = $_GET['idcliente'];
$sql = "SELECT * FROM ordenestudio as o inner join resultado as r on o.idorden = r.idorden where idcliente = $idcliente";
?>

<table id="tablaResultados" class="table table-hover table-condensed table-bordered mt-5" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Fecha</th>
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
            $user = $_SESSION['user'];
            $pass= $_SESSION['pass'];
            $d = new Conexion("localhost","laboratorio",$user,$pass);
            $res = $d->ejecutar($sql);
            if(!$res){
                printf("Errormessage: %s\n", mysqli_error($abr->getCon()));
                
            }
                while($row = mysqli_fetch_assoc($res)):
            ?>
                    <tr>
                        <td class="idestudio d-none"><?php echo $row['idorden']; ?></td>
                        <td class="fecha"><?php echo $row['fecha']; ?></td>
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
                            <img src="<?php echo("../".$row['imagen1']);?>" alt="" width="50" height="50">
                        </td>
                        <td class="img2 d-none"><?php echo($row['imagen2']) ; ?></td>
                        <td>
                            <img src="<?php echo("../".$row['imagen2']);?>" alt="" width="50" height="50">
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