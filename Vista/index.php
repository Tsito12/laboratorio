<?php
//inicializar una sesion
session_start();
  $alert = '';
//se crea una condicion en donde se verifica que si hay una sesion activa no se podra ir a login permanece en la pagina principal 
if (!empty($_SESSION['active'])) {
  header('location: menu.php');

}else{
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
       $alert = 'Ingrese su usuario y contraseña';
    }

// creacion de conexion y sentencias para el usuario y password mediante la sentencia sql
    else{
    
      require_once "../Modelo/Conexion.php";
      $abr = new Conexion("localhost","laboratorio",$_POST['usuario'],$_POST['clave']);
      $conectar=$abr->getCon();
      $user = mysqli_real_escape_string($conectar,$_POST['usuario']);
      $pass = mysqli_real_escape_string($conectar,$_POST['clave']);
      $cont = $_POST['clave'];

    /*  
	$query = mysqli_query($conectar,"SELECT * FROM empleado  WHERE usuario = '$user' AND contraseña = '$pass'");
    $result = mysqli_num_rows($query);
	*/
    


//se obtienen los valores del query
	  $_SESSION['active'] = true;
	  $_SESSION['user']=$_POST['usuario'];
	  $_SESSION['pass']=$_POST['clave'];
      //$_SESSION['conexion']=serialize($abr->getCon());
	  //var_dump($_SESSION['conexion']);
	  //var_dump($conectar!=null);
      if($conectar!=null){
		header('location: menu.php');
	  }
      }
    }
  }

?>



<!doctype html>
<html lang="en">
  <head>
  	<title>Acceso al sistema</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(XTrISztd_400x400.jpg);"></div>
		      	<h3 class="text-center mb-0">Aceeso al sistema</h3>
		      	<p class="text-center"></p>
						<form action=" " method="post" class="login-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="clave" class="form-control" placeholder="Contraseña" required>
	            </div>
	            <div class="form-group d-md-flex">
								
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3">Acceder</button>
	            </div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>

	</body>
</html>

