<!DOCTYPE html>
<html>
    <head>
        <title>Navigation Bar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/nav.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top mainmenu">
            <div class="container-fluid">
              <div class="navbar-header">
                <div class="navbar-brand"><img src="../XTrISztd_400x400.jpg" alt="" style="height: 40px;"></div>
                <div class="custom-menu">
                  <ul class="nav navbar-nav tool-items">
                    <a href="#" class="btn btn-danger" style="margin-top: 7px; margin-right: 10px;">Salir</a>
                    <!--<li class="lang-picker">
                      <div class="lang lang-current">   <a href="#">EN <span class="caret"></span></a>
                      </div>
                      <div class="lang list">
                          <a href="#">LT</a>
                      </div> -->
                    </li>
                  </ul> 
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#" class="nav-link">Grupo Biomedico Eduardo Perez Ortega</a></li>
                  <li class="dropdownList">
                    <a class="dropdown-toggle"data-toggle="dropdown" href="#">Estudios <span class="caret"></span> <!-- class="caret" used to open drop down list -->
                    </a>
                  <ul class="dropdown-menu">
                      <!-- class="dropdown-menu" display drop down list values -->
                      <li><a
                      href="">Lista de estudios</a></li>
                      <li><a
                      href="">Resultados</a></li>
                      <li><a
                      href="">Perfiles</a></li>
                      </li>
                  </ul>
                  <li><a href="#" class="nav-link">Recepcion</a></li>
                  <li><a href="#" class="nav-link">Estaditicas</a></li>
                  <li><a href="#" class="nav-link">Reportes</a></li>
                  
                </ul>
              </div>
            </div>
          </nav>
    </body>
</html>