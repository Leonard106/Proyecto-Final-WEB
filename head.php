<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pagina ICO</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="https://www.unam.mx/" class="brand-logo">UNAM</a>
      
      <ul class="right hide-on-med-and-down">
        <li><a href="https://www.aragon.unam.mx/fes-aragon/#!/inicio">FES Aragon</a></li>
        
        <?php if(isset($_SESSION['username'])) { ?>
            <li>
                <a href="./controller/logout.php" class="btn red lighten-1 waves-effect waves-light" style="margin-left: 10px;">
                    <i class="material-icons right">exit_to_app</i>Cerrar Sesión
                </a>
            </li>
        <?php } ?>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="https://www.aragon.unam.mx/fes-aragon/#!/inicio">FES Aragon</a></li>
        <?php if(isset($_SESSION['username'])) { ?>
            <li><a href="./controller/logout.php"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
        <?php } ?>
      </ul>
      
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="row">
    <div class="col s12 m12">