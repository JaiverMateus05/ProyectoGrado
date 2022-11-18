<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$tarea = TareasC::VerTareaC($columna, $valor);

$valor = $tarea["id_seccion"];

$seccion = SeccionesC::VerSeccionesC($columna, $valor);

$valor = $seccion["id_aula"];

$aula = AulasC::VerAulas2C($columna, $valor);

if ($_SESSION["rol"] == "Profesor" && $aula["id_profesor"] != $_SESSION["id"]) {
    echo '<script>
    window.location = "http://localhost/Aulas/Mis-Aulas";
    </script>';

    return;
} else if ($_SESSION["rol"] == "Estudiante") {
    $columna = "id_aula";
    $valor = $aula["id"];
    $columna2 = "id_alumno";
    $valor2 = $_SESSION["id"];

    $inscrito = AlumnosC::VerInscritoC($columna, $valor, $columna2, $valor2);

    if ($inscrito == false) {
        echo '<script>
        
        window.location = "http://localhost/Aulas/Aulas-Virtuales";
        </script>';
    }
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

<div class="content-wrapper">

    <section class="content-header">

        <?php

        echo '<a href="http://localhost/Aulas/Aula/' . $seccion["id_aula"] . '">
<h1>Volver al aula de ' . $aula["materia"] . '</h1>
</a>';


        if ($_SESSION["rol"] == "Profesor") {
            echo '<form method="post">
    <h3>Tarea: <input type="text" name="nombre" value="' . $tarea["nombre"] . '">
    <button class="btn btn-success btn-xs" type="submit" data-toggle="tooltip" title="guardar"><i class="fa fa-check"></i></button></h3>

    <input type="hidden" name="id" value="' . $exp[1] . '">

    <h2>Fecha limite:
    

    <input type="datetime-local"  name="fecha_limite" value="' . $tarea["fecha_limite"] . '">
    <button class="btn btn-success btn-xs" type="submit" data-toggle="tooltip" title="guardar"><i class="fa fa-check"></i></button></h3>


    </h2>
    
    </section>
    
    <section class="content">
    <div class="box">
        <div class="box-body">

        <button class="btn btn-success pull-right" type="submit">Guardar<i class="fa fa-check"></i></button></h3>
<br><br>
        <textarea id="editor" name="descripcion">
        ' . $tarea["descripcion"] . '
        </textarea>

        </form>';

           
        $guardarTarea = new TareasC();
        $guardarTarea->GuardarTareaC();

            echo '<hr>
            <h2>Archivos</h2>
            <form method="post" enctype="multipart/form-data">
            
            <input type="text" name="nombre" placeholder="Nombre de tarea" required>

            <br>
            Subir Tarea:<input type="file" name="tarea" required="">

            <input type="hidden" name="id_tarea" value="' . $exp[1] . '" required>
            <input type="hidden" name="id_seccion" value="' . $seccion["id"] . '" required>


            <br>

            <button type="submit" class="btn btn-success">Subir Archivo</button>
            
            ';
            
           

            $subirTarea = new TareasC();
            $subirTarea->SubirTareaC();

            echo ' </form>';

            

            $columna = "id_tarea";
            $valor = $exp[1];

            $Tareas = TareasC::VerTC($columna, $valor);

            foreach ($Tareas as $key => $value) {
                echo '<h2>' . $value["nombre"] . '
               
               <a href="http://localhost/Aulas/' . $value["tarea"] . '" download="' . $value["nombre"] . '">Descargar</a>
               
               
               </h2>';
            }

            echo '<hr>
          <a href="http://localhost/Aulas/Entregas/' . $exp[1] . '"><button class="btn btn-primary">Entregas Realizadas</button></a>
          
          </div>
            </div>
        </section>';
        } else {
            echo '
    <h3>Tarea:' . $tarea["nombre"] . '
    <h2>Fecha limite:
    <i class="fa fa-calendar"></i>

    ' . $tarea["fecha_limite"] . '
    </h2>
    
    </section>
    
    <section class="content">
    <div class="box">
        <div class="box-body">
<br><br>
        ' . $tarea["descripcion"] . '';

            echo ' </form>';

            $columna = "id_tarea";
            $valor = $exp[1];

            $Tareas = TareasC::VerTC($columna, $valor);

            foreach ($Tareas as $key => $value) {
                echo '<h2>' . $value["nombre"] . '
            
            <a href="http://localhost/Aulas/' . $value["tarea"] . '" download="' . $value["nombre"] . '">Descargar</a>
            
            
            </h2>';
            }

            echo '<hr>
        <h2>Entregas:</h2>';


            $columna = "id_alumno";
            $valor = $_SESSION["id"];

            $entregas = TareasC::VerEntregasC($columna, $valor);

            foreach ($entregas as $key => $ent) {

                if ($ent["id_tarea"] == $exp[1]) {
                    $notas = TareasC::VerNotasC();

                    foreach ($notas as $key => $nota) {
                        if($nota["id_entrega"] == $ent["id"]){
                            if($nota["estado"] == "Pendiente"){
                                echo '<p><a href="http://localhost/Aulas/'.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">Descargar</a>
                                <button class="btn btn-warning btn-xs"> '.$nota["estado"].'</button></p>';
                            }else if($nota["estado"] == "Reprobado"){
                                echo '<p><a href="http://localhost/Aulas/'.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">Descargar</a>
                                <button class="btn btn-danger btn-xs">Nota: '.$nota["nota"].' - '.$nota["estado"].'</button></p>';
                            }else{
                                echo '<p><a href="http://localhost/Aulas/'.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">Descargar</a>
                                <button class="btn btn-success btn-xs">Nota: '.$nota["nota"].' - '.$nota["estado"].'</button></p>';

                            }
                        }
                    }
                }
            }
            $año = date("Y");
            $mes = date("m");
            $dia = date("d");

            $fecha = $mes . "/" . $dia . "/" . $año;

            if ($fecha <= $tarea["fecha_limite"]) {

                echo '<h2>Hacer Entrega:</h2>
            
            <form method="post" enctype="multipart/form-data">
            
            <input type="file" name="tarea_alumno" required>

            <input type="hidden" name="id_tarea" value="' . $tarea["id"] . '">
            <input type="hidden" name="id_seccion" value="' . $seccion["id"] . '">

            <input type="hidden" name="id_alumno" value="' . $_SESSION["id"] . '">

            <br>

            <button class="btn btn-primary btn-sm" type="submit">Enviar</button>

            </form>';

                $entrega = new TareasC();
                $entrega->EntregarTareaC();
            }

            echo '   </div>
    </div>
</section>
   ';
        }
        ?>




</div>