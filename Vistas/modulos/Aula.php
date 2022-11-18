<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$aula = AulasC::VerAulas2C($columna, $valor);

if ($_SESSION["rol"] == "Estudiante") {
    $columna = "id_aula";
    $valor = $exp[1];
    $columna2 = "id_alumno";
    $valor2 = $_SESSION["id"];

    $inscrito = AlumnosC::VerInscritoC($columna, $valor, $columna2, $valor2);

    if ($inscrito == false) {
        echo '<script>
        
        window.location = "http://localhost/Aulas/Aulas-Virtuales";
        </script>';
    }
} else if ($_SESSION["rol"] == "Profesor" && $_SESSION["id"] != $aula["id_profesor"]) {
    echo '<script>
        
    window.location = "http://localhost/Aulas/Mis-Aulas";
    </script>';
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
        <?php
        echo '<h1>Aula Virtual de la materia: <b>' . $aula["materia"] . '</b></h1>';

        ?>
    </section>

    <section class="content">



        <?php

        if ($_SESSION["rol"] == "Profesor") {

            echo ' <form method="post">
        <input type="hidden" name="id_aula" value="' . $exp[1] . '">

        <button type="submit" class="btn btn-primary">Agregar</button>';

            $crearS = new SeccionesC();
            $crearS->CrearSeccionC();
            echo '</form>';
        }

        if ($_SESSION["rol"] == "Profesor") {

            echo '<a href="http://localhost/Aulas/Inscritos/' . $exp[1] . '">
            <button class="btn btn-success pull-right">Ver Alumnos</button>
            </a>';
        } else if ($_SESSION["rol"] == "Estudiante") {

            echo '<form method="post">

           <input type="hidden" name="id_alumno" value="' . $_SESSION["id"] . '">
           <input type="hidden" name="id_aula" value="' . $exp[1] . '">

           <button type="submit" class="btn btn-danger">Cancelar Inscripcion</button>

           </form>';

            $darbaja = new AlumnosC();
            $darbaja->DarBajaC();
        }

        ?>

        <br><br>

        <?php


        $columna = null;
        $valor = null;

        $resultado = SeccionesC::VerSeccionesC($columna, $valor);


        foreach ($resultado as $key => $value) {
            if ($value["id_aula"] == $exp[1]) {
                echo '<div class="box">
    <div class="box-header">';

                if ($_SESSION["rol"] == "Profesor") {
                    echo '<form method="post">

        <h3 class="box-title"><input type="text" name="nombre" class="form-control" value="' . $value["nombre"] . '"></h3>

        <input type="hidden" name="id_seccion" value="' . $value["id"] . '">

        <button type="submit" class="btn btn-success">Guardar Cambios <i class="fa fa-pencil"></i></button>';

                    $nombre = new SeccionesC();
                    $nombre->EditarNombreSC();

                    echo ' </form>';
                } else {

                    echo '<h3 class="box-title">' . $value["nombre"] . '</h3>';
                }



                echo '
        <div class="box-tools pull-right">

            <button type="button" class="btn" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button> ';
                if ($_SESSION["rol"] == "Profesor") {
                    echo ' <button class="btn btn-danger BorrarSeccion" Sid="'.$value["id"].'" data-toggle="modal" data-target="#BorrarSeccion">
                <i class="fa fa-times"></i>
            </button>';
                }
                echo '    </div>
    </div>
    <div class="box-body">';
                if ($_SESSION["rol"] == "Profesor") {

                    if ($value["descripcion"] == "") {
                        echo '<a href="http://localhost/Aulas/D-S/' . $value["id"] . '">
            <button class="btn btn-success">Agregar descripcion</button>
        </a>';
                    } else {
                        echo '' . $value["descripcion"] . '
            <a href="http://localhost/Aulas/D-S/' . $value["id"] . '">
            <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
        </a>
            ';
                    }
                } else {
                    echo $value["descripcion"];
                }
                if ($_SESSION["rol"] == "Profesor") {

                    echo ' <hr>
            <button class="btn btn-primary AgregarArchivo" Sid="' . $value["id"] . '" data-toggle="modal" data-target="#AgregarArchivo">Agregar Archivo</button>';

                    echo '<br>
        
        <h3><b>Archivos:</b></h3>
        ';

                    $columna = "id_seccion";
                    $valor = $value["id"];

                    $archivos = SeccionesC::VerArchivosC($columna, $valor);

                    foreach ($archivos as $key => $arch) {
                        echo '<form method="post">
            
            ' . $arch["nombre"] . ' - <a href="http://localhost/Aulas/' . $arch["archivo"] . '" download="' . $arch["nombre"] . '" >Descargar </a>
            
            <input type="hidden" name="id" value="' . $arch["id"] . '">
            <input type="hidden" name="id_a" value="' . $exp[1] . '">
            <input type="hidden" name="archivo" value="' . $arch["archivo"] . '">

            <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" title="Eliminar Archivo">
            <i class="fa fa-trash"></i></button>


            
            </form>
            <br>';

                        $borrarArch = new SeccionesC();
                        $borrarArch->borrarArchivoC(); 
                    }

                    echo '<hr>
                        <h3><b>Tareas:</b></h3>
                        
                        
                        <form method="post">

                        <input type="hidden" name="idSeccion" value="'.$value["id"].'">

                        <button class="btn btn-warning" type="submit">Agregar Tarea</button>

                        
                        </form>
                        <br>';

                        $columna = "id_seccion";
                        $value = $value["id"];

                        $Tareas = TareasC::VerTareasC($columna, $valor);

                        foreach($Tareas as $key => $tarea){

                            echo '<form method="post">
                            <a href="http://localhost/Aulas/Tarea/'.$tarea["id"].'">

                            <button type="button" class="btn btn-warning">'.$tarea["nombre"].'<i class="fa fa-eye"></i></button> -';

                            if($tarea["fecha_limite"] == ""){
                                echo 'Sin Fecha Limite.';
                            }else{
                                echo $tarea["fecha_limite"];
                            }
                           echo' </a>
                           
                           
                           
                           <input type="hidden" name="idT" value="'.$tarea["id"].'">
                           <input type="hidden" name="idAula" value="'.$exp[1].'">

                           <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Tarea"> <i class="fa fa-times"></i></button>';


                           $borrarTarea = new SeccionesC();
                           $borrarTarea -> BorrarTareaC();
                          echo' </form>
                           <br><br>
                            ';
                        }

                       
                }else{

                    echo '<hr>
                    <h3><b>Archivos:</b></h3>';

                    $columna = "id_seccion";
                    $valor = $value["id"];

                    $archivos = SeccionesC::VerArchivosC($columna, $valor);

                    foreach ($archivos as $key => $arch) {
                       
                        echo '
            
            ' . $arch["nombre"] . ' - <a href="http://localhost/Aulas/' . $arch["archivo"] . '" download="' . $arch["nombre"] . '">Descargar</a>
            
            <br>';
            
                }
                echo '<hr>
                        <h3><b>Tareas:</b></h3>';

                        $columna = "id_seccion";
                        $value = $value["id"];

                        $Tareas = TareasC::VerTareasC($columna, $valor);

                        foreach($Tareas as $key => $tarea){

                            echo '<a href="http://localhost/Aulas/Tarea/'.$tarea["id"].'">
                            
                            <button type="button" class="btn btn-warning">'.$tarea["nombre"].'<i class="fa fa-eye"></i></button> -';

                            if($tarea["fecha_limite"] == ""){
                                echo 'Sin Fecha Limite.';
                            }else{
                                echo $tarea["fecha_limite"];
                            }
                           echo' </a> 
                           
                           
                           
                           
                           <br><br>
                            ';
                        }

            }



                echo ' </div>
</div>';
            }
        }
        ?>




    </section>
</div>

<div class="modal fade" id="AgregarArchivo">

    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <h2>Nombre del Archivo:</h2>

                            <input type="text" class="form-control input-lg" name="nombreA" required="">

                            <input type="hidden" id="idS" name="id_s" value="">

                            <?php
                            echo ' <input type="hidden" name="id_a" value="' . $exp[1] . '">';
                            ?>


                        </div>
                        <div class="form-group">
                            <h2>Archivo:</h2>
                            <input type="file" class="form-control input-lg" name="archivo" required="">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

                <?php
                $agregar = new SeccionesC();
                $agregar->AgregarArchivoC();


                ?>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="BorrarSeccion">

    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post">

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <h2>¿Desea Eliminar Esta Seccion?</h2>

                            <input type="hidden" class="form-control input-lg" id="idSE" name="idS" required="">

                            <?php
                            echo ' <input type="hidden" name="id_a" value="' . $exp[1] . '">';
                            ?>


                        </div>
                        
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Si</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                </div>

                <?php
                 $borrarSeccion = new SeccionesC();
                $borrarSeccion -> BorrarSeccionC();


                ?>
            </form>
        </div>
    </div>
</div>
<?php

$tarea = new TareasC();
$tarea -> AgregarTareaC();

