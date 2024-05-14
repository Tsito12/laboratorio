<?php
            session_start();
            require_once "../Modelo/Conexion.php";
            $user = $_SESSION['user'];
            $pass= $_SESSION['pass'];
            $idorden = $_GET['idorden'];
            $d = new Conexion("localhost","laboratorio",$user,$pass);
            $sql = "SELECT d.idestudio, nombre, tipo FROM detalleorden as d inner join estudio as e 
            on d.idestudio = e.idEstudio where idorden = $idorden";
            $res = $d->ejecutar($sql);
            while($row = mysqli_fetch_assoc($res)){
                $idestudio = $row['idestudio'];
                $nombre = $row['nombre'];
                if($row['tipo']=="perfil"){

                
        ?>
            <h3><?php echo($row['nombre'])?></h3>

        <?php
                    $sql2 = "SELECT e.idEstudio, p.idperfil ,e.nombre FROM perfil as p INNER JOIN detalleperfil as d on p.idperfil = d.idperfil 
                    INNER JOIN estudio as e on e.idEstudio = d.idestudio where  p.nombre = '$nombre'";
                    $res2 = $d->ejecutar($sql2);
                    while($row2 = mysqli_fetch_assoc($res2)){
        ?>

<div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                
                    <input type="text" name="idestudio" id="idestudio" class="idestudio d-none" value="<?php echo($row2['idEstudio'])?>">
                    <input type="text" id="estudio" name="estudio" class="form-control" value="<?php echo($row2['nombre'])?>" disabled/>
                    <label class="form-label" for="estudio">Estudio</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="resultado" name="resultado" class="form-control resultado" required/>
                    <label class="form-label" for="resultado">Resultado*</label>
                </div>
            </div>
        </div>

        

        <div class="row">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="nota" name="nota" class="form-control nota" required/>
                    <label class="form-label" for="nota">Nota</label>
                </div>
            </div>
        </div>
        
        <?php }?>
        <hr>
        <?php
                }else{
                    ?>
                
        <div class="row mt-2">    
            <div class="col">
                <div class="form-outline">
                
                    <input type="text" name="idestudio" id="idestudio" class="d-none idestudio" value="<?php echo($row['idestudio'])?>">
                    <input type="text" id="estudio" name="estudio" class="form-control" value="<?php echo($row['nombre'])?>" disabled/>
                    <label class="form-label" for="estudio">Estudio</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="resultado" name="resultado" class="form-control resultado" required/>
                    <label class="form-label" for="resultado">Resultado*</label>
                </div>
            </div>
        </div>

        

        <div class="row">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="nota" name="nota" class="form-control nota" required/>
                    <label class="form-label" for="nota">Nota</label>
                </div>
            </div>
        </div>

        <?php }?>
    <?php
    }
    ?>