<?php
session_start();
if($_SESSION['user']==""||$_SESSION['user']==null||$_SESSION['user']=="acceso"){
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
       
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>-->
        
    </head>
    <body>
        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(153, 204, 146);">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="../XTrISztd_400x400.jpg"
            height="15"
            alt="Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="active"><a href="#" class="nav-link">Grupo Biomedico Eduardo Perez Ortega</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Esudios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php

                  if($_SESSION['user']=="directoroperativo"||$_SESSION['user']=="laboratorio"){  ?>

                <li><a class="dropdown-item" href="form.php">Ingresar estudios</a></li>
                <li><a class="dropdown-item" href="Estudios.php">Lista de estudios</a></li>
                <li><a class="dropdown-item" href="IngresarResultados.php">Resultados</a></li>
                <li><a class="dropdown-item" href="Perfiles.php">Perfiles</a></li>
                <li><a class="dropdown-item" href="EditarPerfil.php">Editar Perfiles</a></li>
                <li><a class="dropdown-item" href="Grupo.php">Grupos</a></li>
                <li><a class="dropdown-item" href="Contenedores.php">Contenedores</a></li>
                <li><a class="dropdown-item" href="ValoresReferencia.php">Valores de referencia</a></li>
                
                <?php
                  }elseif($_SESSION['user']=="recepcion"){?>

                <li><a class="dropdown-item" href="Estudios.php">Lista de estudios</a></li>

                <?php
                  }
                ?>
              </ul>
            </li>
          

            <?php
                  if($_SESSION['user']=="directoroperativo"||$_SESSION['user']=="recepcion"){  ?>


            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Recepcion
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Recepcion.php">Recepcion</a></li>
              <li><a class="dropdown-item" href="ListaDeOrdenes.php">Liquidar Ordenes</a></li>
            </ul>
          </li>

          <?php
            }
          ?>


          <?php
            if($_SESSION['user']=="directoroperativo"||$_SESSION['user']=="recepcion"){  ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Médicos asociados
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Doctores.php">Ingresar Médicos</a></li>
              <li><a class="dropdown-item" href="ListaDoctores.php">Lista de Médicos</a></li>
            </ul>
          </li>

          <?php
            }
          ?>

          <?php
            if($_SESSION['user']=="directoroperativo"){  ?>
          <li class="nav-item">
            <a class="nav-link" href="Reportes.php">Reportes</a>
          </li>
          <?php
            }
          ?>

          <?php
            if($_SESSION['user']=="directoroperativo"||$_SESSION['user']=="recepcion"){  ?>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Clientes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Clientes.php">Ingresar clientes</a></li>
              <li><a class="dropdown-item" href="ListaClientes.php">Lista de clientes</a></li>
              <li><a class="dropdown-item" href="HistorialClientes.php">Hisotrial de clientes</a></li>
            </ul>
          </li>

          <?php
            }
          ?>

          <?php
            if($_SESSION['user']=="directoroperativo"){  ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Empleados
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Empleados.php">Ingresar Empleados</a></li>
              <li><a class="dropdown-item" href="ListaEmpleados.php">Lista de Empleados</a></li>
            </ul>
          </li>
          <?php
            }
          ?>

        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
  
        <!-- Avatar -->
        <a class="btn btn-danger" href="../Control/salir.php">Salir</a>
        
        
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
    </body>
</html>