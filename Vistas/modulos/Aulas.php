<?php
if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
    window.location="Inicio";
    
    </script>';

    return;
}

?>

<header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/Aulas/Inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-university"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Aula virtual</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

<?php 
              if($_SESSION["foto"]==""){
                echo '<img src="http://localhost/Aulas/Vistas/img/default.jpg" class="user-image" alt="User Image">';
                 }else{

                  echo '<img src="http://localhost/Aulas/'.$_SESSION["foto"].'" class="user-image" alt="User Image">';
                 }

                 echo'<span class="hidden-xs">'.$_SESSION["apellido"].''.$_SESSION["nombre"].'</span>';

?>

              
              
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height:100px">
              <?php
                echo '<p>
                '.$_SESSION["apellido"].''.$_SESSION["nombre"].'';

                  
                    echo '<small>'.$_SESSION["rol"].'</small>';
                  
                    
               
                echo'</p>';


              ?>

                
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/Aulas/Mis-Datos" class="btn btn-primary btn-flat">Mis datos</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/Aulas/Salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
     
          
        </ul>
      </div>
    </nav>
  </header>

<div class="content-wrapper">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aula</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/select2/dist/css/select2.min.css">




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


  <script src="http://localhost/Aulas/Vistas/sweetalert2/sweetalert2.all.js"></script>

</head>
    <section class="content-header">
        <h1>Aula Virtual</h1>
        <br>

        <form method="post">
            <div class="row">
                <div class="col-md-3">
                    <h2>Carrera:</h2>
                    <select name="id_carrera" id="select2" class="form-control" required="">
                        <option value="">Seleccionar</option>
                        <?php
                        $resultado = CarrerasC::VerCarrerasC();
                        foreach ($resultado as $key => $value) {
                            echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <h2>Profesor:</h2>
                    <select name="id_profesor" id="select2-1" class="form-control" required="">
                        <option value="">Seleccionar</option>
                        <?php
                        $columna = null;
                        $valor = null;

                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            if ($value["rol"] == "Profesor") {
                                echo '<option value="' . $value["id"] . '">' . $value["apellido"] . ' ' . $value["nombre"] . '</option>';
                            }
                        }
                        ?>
                    </select>


                </div>

                <div class="col-md-3">

                    <h2>Materia</h2>
                    <input type="text" class="form-control" name="materia" required="">
                </div>

            </div>
            <br>
            <button class="btn btn-primary" type="submit">Crear Aula</button>

            <?php

            $crear = new AulasC();
            $crear->CrearAulaC();
            ?>
        </form>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <div class="row">

                    <?php
                    $resultado = AulasC::VerAulasC();

                    foreach ($resultado as $key => $value) {
                        echo '<div class="col-lg-3 col-xs-6">
<div class="small-box  bg-blue">
    <button class="btn btn-danger pull-right EliminarAula" Aid="'.$value["id"].'" data-toggle="tooltip" title="Eliminar"><i class="fa fa-times"></i></button>
<div class="inner">
    <h4>'.$value["materia"].'</h4>';
$columna = "id";
$valor = $value["id_profesor"];

$profesor = UsuariosC::VerUsuariosC($columna,$valor);

echo'<p>Profesor: '.$profesor["apellido"].' '.$profesor["nombre"].'</p>';
    
echo '</div>

</div>
</div>';
                    }


                    $borrar = new AulasC();
                    $borrar -> BorrarAulaC();
                    ?>


                </div>

            </div>
        </div>
    </section>
</div>