<?php
require_once "../Modelo/Conexion.php";
session_start();
$accion = $_POST['accion'];
$user = $_SESSION['user'];
$pass= $_SESSION['pass'];
$d = new Conexion("localhost","laboratorio",$user,$pass);
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del area</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql ="SELECT * FROM `grupo` ORDER BY nombre;";
        $res = $d->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($d->getCon()));
        }
        while($reg = mysqli_fetch_array($res))://while ($ver=mysqli_fetch_row($result)):
        ?>
        <tr>
            <td class="id"><?php echo $reg[0]; ?></td>
            <td class="nombre"><?php echo $reg[1]; ?></td>
            <td class="prioridad"><?php echo $reg[2]; ?></td>
            <td>
                <a class="btn btn-warning" onclick="editar(this)" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                <a class="btn btn-danger" onclick="eliminar(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>Borrar</a>
            </td>
        </tr>
        <?php endwhile?>
    </tbody>
</table>