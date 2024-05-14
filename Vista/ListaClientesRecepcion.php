<div  class="modal fade" id="exampleModalM" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Lista de clientes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row text-center justify-content-center">
            <div class="col-6"><input id="buscarClientes" class="form-control" type="text" name="Buscar" onkeyup="buscarTablaClientes()" placeholder="Buscar clientes"></div>
        </div>
                <div class="table-responsive" id="abr">
                    <table class="table table-hover" id="tabla">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Seleccion</th>
                            </tr>
                        </thead>
                        <tbody id="tablaClientes">
                    <?php
                    session_start();
                    require_once "../Modelo/Conexion.php";
                    $user = $_SESSION['user'];
                    $pass= $_SESSION['pass'];
                    $d = new Conexion("localhost","laboratorio",$user,$pass);
                    $sql ="SELECT * FROM `cliente`;";
                    $res = $d->ejecutar($sql);
                    if(!$res){
                        printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                    }
                    while($reg = mysqli_fetch_array($res))://while ($ver=mysqli_fetch_row($result)):
                    ?>
                    <tr>
                        <td class="id"><?php echo $reg[0]; ?></td>
                        <td class="nombre"><?php echo $reg[1]; ?></td>
                        <td class="apellidoPaterno"><?php echo $reg[2]; ?></td>
                        <td class="apellidoMaterno"><?php echo $reg[3]; ?></td>
                        <td class="edad"><?php echo $reg[4]; ?></td>
                        <td class="periodo">
                            <?php 
                            $periodo = $reg[5];
                            switch ($periodo){
                                case "years": echo("Años");
                                break;
                                case "months": echo("Meses");
                                break;
                                case "days": echo("Días");
                                break;
                            }
                            ?>
                        </td>
                        <td class="sexo">
                            
                            <?php 
                            $sexo = $reg[6];
                            echo($sexo=='M')?"Masculino":"Femenino";
                            //echo($reg[6]); 
                            ?>
                        </td>
                        <td class="rutmaimg d-none"><?php echo $reg[10]; ?></td>
                        <td class="img"><img src="../<?php echo $reg[10]; ?>" alt="" width="50" height="50"></td>
                        <td><button class="btn btn-info" data-bs-dismiss="modal" onclick="seleccionarCliente(this)">Seleccionar</button></td>
                        
                    </tr>
                    <?php endwhile?>
                </tbody>
                    </table>
                    <nav>
                    <div id="barra" class="box"></div>
                    </nav>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>