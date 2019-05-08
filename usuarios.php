<?php
session_start();
include_once('conexion.php');

  if (isset($_SESSION['admin'])) {
    # code...
    $usser = $_SESSION['admin'];
  //  echo "bienvenido ".$_SESSION['admin'];
  }else{
    header('location:index.html');
    //echo "ERROR AL INGRESAR AL CONTENIDO PROTEGIDO";
  }

  $sql_usuarios = 'SELECT * FROM usuario where estado = 1';
  $sentencia_leer = $pdo->prepare($sql_usuarios);
  $sentencia_leer->execute();
  $mis_usuarios = $sentencia_leer->fetchAll();


    //EDITAR
    if ($_GET) {
      $id = $_GET['id'];
      
      $sql_persona = 'SELECT * FROM usuario where id=?';
      $sentencia_persona = $pdo->prepare($sql_persona);
      $sentencia_persona->execute(array($id));
      $resultado_persona = $sentencia_persona->fetch();

      $sentencia_persona=null;
  }


?>
<!doctype html>
<html lang="en">

<head>
  <title>USUARIOS / CRUD</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        
        <a href="#!" class="simple-text logo-normal">
          <?php echo $usser; ?>
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="a22549ba-31fa-8820-8253-1ce974dbcdc7">
        <ul class="nav">
          <li class="nav-item   ">
            <a class="nav-link" href="/material/template.php">
              <i class="material-icons">dashboard</i>
              <p>Estadisticas</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="usuarios.php">
              <i class="material-icons">person</i>
              <p>USUARIOS</p>
            </a>
          </li>
         
         
        </ul>
      <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <form class="navbar-form">
                <span class="bmd-form-group"><div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
                </div></span>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  <div class="ripple-container"></div></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                    <a class="dropdown-item" href="#">Another Notification</a>
                    <a class="dropdown-item" href="#">Another One</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  <div class="ripple-container"></div></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cerrar.php">Log out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- End Navbar -->
      <div class="content">
            <div class="container-fluid">
            <!-- your content here -->
            <div class="row">
                <div class="col-md-6">
                        <div class="card">
                        <?php if(!$_GET): ?>
                            <div class="card-header card-header-danger">
                                <h4 class="card-title text-center">REGISTRO DE USUARIOS</h4>
                                <p class="category"></p>
                            </div>
                        <?php endif ?>

                        <?php if($_GET): ?>
                            <div class="card-header card-header-danger">
                                <h4 class="card-title text-center">EDITAR DE USUARIOS</h4>
                                <p class="category"></p>
                            </div>
                        <?php endif ?>

                            <div class="card-body">
                            <?php if(!$_GET): ?>
                                <form method="POST" action="usser.php">
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Ingresar usuario</label>
                                        <input type="text" class="form-control" id="nombres" name="usuario" aria-describedby="emailHelp" placeholder="Usuario">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena"  placeholder="Password">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Repetir Contraseña</label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena2"  placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-success">REGISTRAR USUARIO</button>
                                </form>
                              <?php  endif  ?>

                              <?php if($_GET): ?>
                                <form method="GET" action="/usuarios/editar.php">
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Ingresar usuario</label>
                                        <input type="text" class="form-control" id="nombres" name="usuario" value="<?php echo $resultado_persona['nombre']; ?>"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena"  placeholder="Password">
                                    </div>
                                   

                                    <button type="submit" class="btn btn-success">EDITAR USUARIO</button>
                                </form>
                              <?php  endif  ?>

                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title text-center">LISTA DE USUARIOS</h4>
                      <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <tr><th>
                              ID
                            </th>
                            <th>
                              Usuario
                            </th>
                            <th>
                              Password
                            </th>
                            <th>Operaciones</th>
                          </tr></thead>
                          <tbody>
                          <?php foreach($mis_usuarios as $dato): ?>
                            <tr>
                              <td> <?php echo $dato['id'] ?> </td>
                              <td> <?php echo $dato['nombre'] ?> </td>
                              <td> <?php echo $dato['contrasena'] ?> </td>
                              <td>   <a href="#!"><i class="matrial-icons"></i> Eliminar</a>
                                   <a href="#!"><i class="material-icons"></i> Editar</a> 
                            </td>
                            </tr>
                          <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
      </div>


      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#!">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

  <script src="js/core/jquery.min.js" type="text/javascript"></script>
  <script src="js/core/popper.min.js" type="text/javascript"></script>
  <script src="js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--	Plugin for Sharrre btn -->
  <script src="js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="js/material-kit.min.js?v=2.0.5" type="text/javascript"></script>
</body>

</html>