<div  class="modal fade" id="exampleModalD" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Lista de médicos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row text-center justify-content-center">
            <div class="col-6"><input id="buscarDoctores" class="form-control" type="text" name="Buscar" onkeyup="buscarTablaDoctores()" placeholder="Buscar medicos"></div>
        </div>
                <div class="table-responsive" id="abr">
                    <table class="table table-hover" id="tabla">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Convenio</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Seleccion</th>
                            </tr>
                        </thead>
                        <tbody id="tablaDoctores">
                    <?php
                    session_start();
                    require_once "../Modelo/Conexion.php";
                    $user = $_SESSION['user'];
                    $pass= $_SESSION['pass'];
                    $d = new Conexion("localhost","laboratorio",$user,$pass);
                    $sql ="SELECT * FROM `doctor`;";
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
                        <td class="telefono"><?php echo $reg[10]; ?></td>
                        <td class="email"><?php echo($reg[10]); ?></td>
                        <td class="convenio">
                            <?php 
                            $convenio = $reg[13];
                            echo ($convenio==1)?"Si":"No";
                            ?>
                        </td>
                        <td class="rfc"><?php echo $reg[12]; ?></td>
                        <td><button class="btn btn-info" data-bs-dismiss="modal" onclick="seleccionarMedico(this)">Seleccionar</button></td>
                        
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