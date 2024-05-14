
            <?php
                require_once "../Modelo/Conexion.php";
                session_start();
                $accion = $_POST['accion'];
                $user = $_SESSION['user'];
                $pass= $_SESSION['pass'];
                $d = new Conexion("localhost","laboratorio",$user,$pass);
                $idorden = $_GET['idorden'];
                ?>
            <input type="text" class="d-none" id="id">
            <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Estudio</th>
                        <th scope="col">Parametro</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Imagen 1 </th>
                        <th scope="col">Imagen 2</th>
                        <th scope="col">Valor inicial referencia</th>
                        <th scope="col">Valor final referencia</th>
                        <th scope="col">Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql ="SELECT * FROM `resultado` where idorden = $idorden;";
                    $res = $d->ejecutar($sql);
                    if(!$res){
                        printf("Errormessage: %s %s \n",$sql , mysqli_error($d->getCon()));
                    }
                    while($reg = mysqli_fetch_array($res))://while ($ver=mysqli_fetch_row($result)):
                    ?>
                    <tr>
                        <td class="idresultado d-none"><?php echo $reg[9]; ?></td>
                        <td class="idorden d-none"><?php echo $reg[0]; ?></td>
                        <td class="idestudio d-none"><?php echo $reg[1]; ?></td>
                        <td>
                            <?php
                                $idestudio = $reg[1];
                                $sqlestudio ="SELECT * FROM `estudio` where idestudio = $idestudio;";
                                $result = $d->ejecutar($sqlestudio);
                                if(!$result){
                                    printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                                }
                                $reg2 = mysqli_fetch_array($result);
                                echo($reg2[1]);

                            ?>
                        </td>
                        <td class="parametro"><?php echo $reg[2]; ?></td>
                        <td class="resultado"><?php echo $reg[3]; ?></td>
                        <td class="unidad"><?php echo $reg[4]; ?></td>
                        <td class="idvalor d-none"><?php echo $reg[5]; ?></td>
                        
                        <td class="img1 d-none"><?php echo($reg[6]); ?></td>
                        <td>
                            <img src="<?php echo("../".$reg[6]);?>" alt="" width="50" height="50">
                        </td>
                        <td class="img2 d-none"><?php echo($reg[7]) ; ?></td>
                        <td>
                            <img src="<?php echo("../".$reg[7]);?>" alt="" width="50" height="50">
                        </td>

                        <td class="valorinicial">
                            <?php 
                                $idvalor = $reg[5];
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
                                <?php echo($reg[10]); ?>
                        </td>
                        <td>
                            <?php
                            if($reg[8]==1){
                                ?>
                                <a class="btn btn-danger" onclick="aprobar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Marcar como no aprobado</a>
                            <?php
                            }
                            else{
                                ?>
                                <a class="btn btn-success" onclick="aprobar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Aprobar</a>
                            <?php
                            }
                            ?>
                            
                            <a class="btn btn-warning" onclick="editar(this)" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                            <a class="btn btn-danger" onclick="eliminar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Borrar</a>
                        </td>
                    </tr>
                    <?php endwhile?>
                </tbody>
            </table>