<?php
if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
    
    window.location = "Inicio";
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
        <h1>Gestor de usuarios Administradores y Profesores</h1>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>

            </div>
            <div class="box-body">


                <h2>Mostrar Usuarios de tipo:</h2>

                <a href="http://localhost/Aulas/Usuarios">

                    <button class="btn btn-default">Todos</button>
                </a>
                <a href="http://localhost/Aulas/Usuarios/1">

                    <button class="btn btn-primary">Administradores</button>
                </a>
                <a href="http://localhost/Aulas/Usuarios/2">

                    <button class="btn btn-success">Profesores</button>
                </a>
                <br><br>

                <table class="table table-bordered table-hover table-striped dt-responsive">

                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                     $exp = explode("/", $_GET["url"]);
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

                        foreach ($resultado as $key => $value) {

                            if(isset($exp[1]) && $exp[1]==1){
                                if($value["rol"]== "Administrador"){

                                    echo '
                                    <tr>
                                        <td>'.$value["apellido"].'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["documento"].'</td>
                                        <td>'.$value["usuario"].'</td>
                                        <td>'.$value["clave"].'</td>
                                        <td>'.$value["rol"].'</td>
                                        <td>
                                        <button class="btn btn-success EditarUsuario" data-toggle="modal" data-target="#EditarUsuario" Uid="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger BorrarUsuario" Uid="'.$value["id"].'" Ufoto="'.$value["foto"].'"><i class="fa fa-trash"></i></button>
        
                                        </td>
        
                                    </tr>';
                                }
                            }else if(isset($exp[1]) && $exp[1]==2){
                                if($value["rol"]== "Profesor"){

                                    echo '
                                    <tr>
                                        <td>'.$value["apellido"].'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["documento"].'</td>
                                        <td>'.$value["usuario"].'</td>
                                        <td>'.$value["clave"].'</td>
                                        <td>'.$value["rol"].'</td>
                                        <td>
                                        <button class="btn btn-success EditarUsuario" data-toggle="modal" data-target="#EditarUsuario" Uid="'.$value["id"].'"><i class="fa fa-pencil"></i></button>


                                        <button class="btn btn-danger BorrarUsuario" Uid="'.$value["id"].'" Ufoto="'.$value["foto"].'"><i class="fa fa-trash"></i></button>
        
                                        </td>
        
                                    </tr>';
                                }
                            }else {if($value["rol"] != "Estudiante"){

                                echo '
                                <tr>
                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["documento"].'</td>
                                    <td>'.$value["usuario"].'</td>
                                    <td>'.$value["clave"].'</td>
                                    <td>'.$value["rol"].'</td>
                                    <td>
                                    <button class="btn btn-success EditarUsuario" data-toggle="modal" data-target="#EditarUsuario" Uid="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger BorrarUsuario" Uid="'.$value["id"].'" Ufoto="'.$value["foto"].'"><i class="fa fa-trash"></i></button>
    
                                    </td>
    
                                </tr>';
                            }

                        }
                           
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="CrearUsuario">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Tipo de usuario</h2>
                            <select class="form-control input-lg" name="rol" required="">

                                <option value="">Seleccionar</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Profesor">Profesor</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <?php
                            $exp = explode("/", $_GET["url"]);

                            echo '<input type="hidden" name="link" value="' . $exp[0] . '">';
                            ?>

                            <h2>Apellido:</h2>
                            <input type="text" class="form-control input-lg" name="apellido" required="">
                            <input type="hidden" class="form-control input-lg" name="id_carrera" value="0">
                        </div>

                        <div class="form-group">

                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" name="nombre" required="">
                        </div>
                        <div class="form-group">

                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" name="documento" required="">
                        </div>
                        <div class="form-group">

                            <h2>Usuario:</h2>
                            <input type="text" class="form-control input-lg" id="usuario" name="usuario" required="">
                        </div>

                        <div class="form-group">

                            <h2>Contraseña:</h2>
                            <input type="text" class="form-control input-lg" name="clave" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>

                <?php
                $crear = new UsuariosC();
                $crear->CrearUsuarioC();
                ?>
            </form>
        </div>

    </div>
</div>


<div class="modal fade" id="EditarUsuario">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Tipo de usuario</h2>
                            <select class="form-control input-lg" id="rol" name="rolE" required="">

                                <option value="">Seleccionar</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Profesor">Profesor</option>

                            </select>
                        </div>

                        <div class="form-group">
                           
                            <h2>Apellido:</h2>
                            <input type="text" class="form-control input-lg" id="apellido" name="apellidoE" required="">
                            <input type="hidden" class="form-control input-lg" id="id" name="idE" >
                        </div>

                        <div class="form-group">

                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" id="nombre" name="nombreE" required="">
                        </div>
                        <div class="form-group">

                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" id="documento" name="documentoE" required="">
                        </div>
                       
                        <div class="form-group">

                            <h2>Contraseña:</h2>
                            <input type="text" class="form-control input-lg" id="clave" name="claveE" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>

                <?php
                $actualizar = new UsuariosC();
                $actualizar->ActualizarUsuarioC();
                ?>
            </form>
        </div>

    </div>
</div>


<?php

$borrar = new UsuariosC();
$borrar -> BorrarUsuarioC();

?>