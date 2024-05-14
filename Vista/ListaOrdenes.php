<div  class="modal fade" id="exampleModalO" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Ordenes de estudios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row text-center justify-content-center">
            <div class="col-6"><input id="buscar" class="form-control" type="text" name="Buscar" onkeyup="buscarTabla()" placeholder="Número de orden"></div>
        </div>
                <div class="table-responsive" id="abr">
                    <table class="table table-hover" id="tablaPerfiles">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Diagnostico</th>
                            <th scope="col">Observaciones</th>
                            
                            
                            
                            </tr>
                        </thead>
                        <tbody id="tabla" class="tcuerpo">
                        
                        <?php

                       require_once "../Modelo/Conexion.php";
                       $user = $_SESSION['user'];
                        $pass= $_SESSION['pass'];
                        $d = new Conexion("localhost","laboratorio",$user,$pass);
                       
                        $sql = "SELECT * FROM ordenestudio as o where not EXISTS 
                              (select * from resultado as r where o.idorden = r.idorden and r.aprobado = null)";
                        $result = $d->ejecutar($sql);
                        if (mysqli_num_rows($result) > 0) :
                            while($row = mysqli_fetch_assoc($result)):
                         
                      ?>
                    <tr>
                        <td><?php echo($row['idorden'])?></td>
                        <td><?php echo($row['fecha'])?></td>
                      <?php
                      $idCliente = $row['idcliente'];
                      $consulta = "SELECT * from cliente where idcliente = $idCliente";
                      $res = $d->ejecutar($consulta);
                      if(!$res){
                          printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                      }
                      $reg = mysqli_fetch_array($res);
                      ?>
                      <td><?php echo($reg['nombre']." ".$reg['apellidoP']." ".$reg['apellidoM'])?></td>
                      <td><?php echo($row['diagnostico']) ?></td>
                      <td><?php echo($row['observaciones']) ?></td>
                      <td><button type="button" class="btn btn-info" data-bs-dismiss="modal" onclick="seleccionarOrden(this)">Seleccionar</button></td>
                     

                    </tr>
                    <?php 
                        endwhile;
                    endif;
                    mysqli_close($d->getCon()); 
                    ?>

                        </tbody>
                    </table>
                    <nav>
                    <div id="barra" class="box"></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>