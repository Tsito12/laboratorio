
            <?php
                require_once "../Modelo/Conexion.php";
                session_start();
                $accion = $_POST['accion'];
                $user = $_SESSION['user'];
                $pass= $_SESSION['pass'];
                $d = new Conexion("localhost","laboratorio",$user,$pass);
                $idestudio = $_GET['idestudio'];
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
                        <th scope="col">Sexo</th>
                        <th scope="col">Edad inicial</th>
                        <th scope="col">Periodo inicial</th>
                        <th scope="col">Edad final</th>
                        <th scope="col">Periodo final</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Valor inicial </th>
                        <th scope="col">Valor final</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Altura inicial</th>
                        <th scope="col">Altura final</th>
                        <th scope="col">Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql ="SELECT * FROM `valorreferencia` where idestudio = $idestudio;";
                    $res = $d->ejecutar($sql);
                    if(!$res){
                        printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                    }
                    while($reg = mysqli_fetch_array($res))://while ($ver=mysqli_fetch_row($result)):
                    ?>
                    <tr>
                        <td class="id"><?php echo $reg[0]; ?></td>
                        <td class="sexo"><?php echo $reg[2]; ?></td>
                        <td class="edadinicial"><?php echo $reg[12]; ?></td>
                        <td class="periodoinicial d-none"><?php echo $reg[13]; ?></td>
                        <td >
                            <?php 
                            switch($reg[13]){
                                case "days": echo("Días");
                                break;
                                case "months": echo("Meses");
                                break;
                                case "years": echo("Años");
                                break;
                            }
                            //echo $reg[13]; 
                            ?>
                        </td>
                        <td class="edadfinal"><?php echo $reg[14]; ?></td>
                        <td class="periodofinal d-none"><?php echo $reg[15];?></td>
                        <td >
                            <?php  
                            switch($reg[15]){
                                case "days": echo("Días");
                                break;
                                case "months": echo("Meses");
                                break;
                                case "years": echo("Años");
                                break;
                            }
                            //echo $reg[15]; 
                            ?>
                            
                        </td>
                        <td class="descripcion"><?php echo $reg[5]; ?></td>
                        <td class="valorinicial"><?php echo($reg[6]); ?></td>
                        <td class="valorfinal"><?php echo($reg[7]); ?></td>
                        <td class="unidad"><?php echo $reg[8]; ?></td>
                        <td class="alturainicial"><?php echo $reg[9]; ?></td>
                        <td class="alturafinal"><?php echo $reg[10]; ?></td>
                        <td class="nota"><?php echo $reg[11]; ?></td>
                        <td>
                            <a class="btn btn-warning" onclick="editar(this)" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                            <a class="btn btn-danger" onclick="eliminar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Borrar</a>
                        </td>
                    </tr>
                    <?php endwhile?>
                </tbody>
            </table>