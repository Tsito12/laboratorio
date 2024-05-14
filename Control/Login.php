<?php
//inicializar una sesion
session_start();
  $alert = '';
//se crea una condicion en donde se verifica que si hay una sesion activa no se podra ir a login permanece en la pagina principal 
if ($_SESSION['user']!=""&&$_SESSION['user']!=null&&$_SESSION['user']!="acceso") {
  header('location: ../Vista/menu.php');

}else{
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
       echo('Ingrese su usuario y contraseña');
       return;
    }

// creacion de conexion y sentencias para el usuario y password mediante la sentencia sql
    else{
    
      require_once "../Modelo/Conexion.php";
      $usuario = $_POST['usuario'];
      $pass = $_POST['clave'];
      $abr = new Conexion("localhost","laboratorio","acceso","Login01.");
      $conectar=$abr->getCon();
      if(!$conectar){
        echo("Error de cuenta o contraseña");
        return;
      }else{
        $sql = "SELECT * FROM cuenta WHERE usuario = '$usuario' and password = '$pass'";
        $res = $abr->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($abr->getCon()));
        }
        if (mysqli_num_rows($res) > 0) {
            echo("Acceso exitoso");
            $row = mysqli_fetch_assoc($res);
            $idcuenta = $row['idcuenta'];
            $sqlempleado = "SELECT * FROM empleado where idcuenta = $idcuenta";
            $result = $abr->ejecutar($sqlempleado);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row2 = mysqli_fetch_assoc($result);
                $puesto = $row2['puesto'];
                switch($puesto){
                    case "Director operativo":
                        $_SESSION['user']="directoroperativo";
	                    $_SESSION['pass']="Prueba01.";
                        break;
                    case "Recepcionista":
                        $_SESSION['user']="recepcion";
	                    $_SESSION['pass']="Recepcion01.";
                        break;
                    case "Laboratorio";
                        $_SESSION['user']="laboratorio";
	                    $_SESSION['pass']="Laboratorio01..";
                    break;
                    default: $_SESSION['user']="directoroperativo";
                            $_SESSION['pass']="Prueba01.";
                            break;
                }
                $_SESSION['idempleado']=$row2['idempleado'];
                
              } else {
                echo "0 results";
              }
        }else{
            echo("Error de cuenta o contraseña");
        }
        $reg = mysqli_fetch_array($res);

        
      }
      $user = mysqli_real_escape_string($conectar,$_POST['usuario']);
      $pass = mysqli_real_escape_string($conectar,$_POST['clave']);
      $cont = $_POST['clave'];

    /*  
	$query = mysqli_query($conectar,"SELECT * FROM empleado  WHERE usuario = '$user' AND contraseña = '$pass'");
    $result = mysqli_num_rows($query);
	*/
    


//se obtienen los valores del query
	  $_SESSION['active'] = true;
	  //$_SESSION['user']=$_POST['usuario'];
	  //$_SESSION['pass']=$_POST['clave'];
      //$_SESSION['conexion']=serialize($abr->getCon());
	  //var_dump($_SESSION['conexion']);
	  //var_dump($conectar!=null);
      /*
      if($conectar!=null){
		header('location: Vista/menu.php');
	  }*/
      }
    }
  }

?>