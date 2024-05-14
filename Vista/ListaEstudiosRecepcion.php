<div  class="modal fade" id="exampleModalE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Lista de Estudios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row text-center justify-content-center">
            <div class="col-6"><input id="buscarEstudios" class="form-control" type="text" name="buscarEstudios" onkeyup="buscarTablaEstudios()" placeholder="Buscar estudio"></div>
        </div>
                <div class="table-responsive" id="abr">
                    <table class="table table-hover" id="tablaPerfiles">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Contenedor</th>
                            <th scope="col">Tipo de muestra</th>
                            <th scope="col">Tiempo de procedimiento</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Seleccion</th>
                            
                            
                            
                            </tr>
                        </thead>
                        <tbody id="tablaEstudios" class="tcuerpo">
                        
                        <?php

                       require_once "../Modelo/Conexion.php";
                       $user = $_SESSION['user'];
                        $pass= $_SESSION['pass'];
                        $d = new Conexion("localhost","laboratorio",$user,$pass);
                       
                       $estudios = $d->getEstudiosActivos();
                       if(count($estudios)>0){
                        foreach($estudios as $e){
                         
                      ?>
                    <tr>
                      <td scope="row"><?php echo($e->getIdEstudio()); ?></td>
                      <td><?php echo($e->getNombreEstudio()); ?></td>
                      <?php
                      $idGrupo = $e->getGrupo();
                      $consulta = "SELECT * from grupo where idGrupo = $idGrupo";
                      $res = $d->ejecutar($consulta);
                      if(!$res){
                          printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                      }
                      $reg = mysqli_fetch_array($res);
                      ?>
                      <td><?php echo($e->getTipo()); ?></td>
                      <td><?php echo($reg[1]); ?></td>
                      
                      <?php
                      $idContenedor = $e->getContenedor();
                      $consulta2 = "SELECT * from contenedor where idContenedor = $idContenedor";
                      $res = $d->ejecutar($consulta2);
                      if(!$res){
                          printf("Errormessage: %s\n", mysqli_error($d->getCon()));
                      }
                      $reg = mysqli_fetch_array($res);
                      ?>
                      <td><?php echo($reg[1]); ?></td>
                      <td><?php echo($e->getTipoMuestra()); ?></td>
                      <td><?php echo($e->getTiempo()); ?></td>
                      <td><?php echo($e->getPrecio()); ?></td>
                      <td class="seleccion"><input type="checkbox" name="seleccion" id="seleccion"></td>
                     

                    </tr>
                    <?php 
                     } 
                       }
                    ?>

                        </tbody>
                    </table>
                    <nav>
                    <div id="barra" class="box"></div>
                    </nav>
                </div>
            </div>
            <div class="modal-footer">
                <button id="agregarAlPerfil" class="btn btn-info" >Agregar</button>
                
            </div>
        </div>
    </div>
</div>