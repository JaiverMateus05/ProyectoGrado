<?php
session_start();
?>


<!DOCTYPE html>
<html>
<!-- <script type="text/javascript">
  document.oncontextmenu = function(){
  return false;
}
</script> -->


<body class="hold-transition skin-blue  sidebar-mini login-page">


  <div class="wrapper">


    <?php

    if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {

      echo '<div class="wrapper">';

/*      include "modulos/cabecera.php";
 */
     if ($_SESSION["rol"] == "Administrador") {
        include "modulos/menu.php";
      } else if ($_SESSION["rol"] == "Estudiante") {
        include "modulos/menuE.php";
      } else {
        include "modulos/menuP.php";
      } 


      $url = array();
      if (isset($_GET["url"])) {
        $url = explode("/", $_GET["url"]);

        if (
          $url[0] == "Inicio" || $url[0] == "Salir" || $url[0] == "Mis-Datos" || $url[0] == "Usuarios" || $url[0] == "Carreras" || $url[0] == "Editar-Carrera"
          || $url[0] == "Estudiantes" || $url[0] == "Aulas" || $url[0] == "Aulas-Virtuales" || $url[0] == "Inscribir" || $url[0] == "Aula"
          || $url[0] == "Mis-Aulas" || $url[0] == "Inscritos" || $url[0] == "D-S" || $url[0] == "Tarea" || $url[0] == "Entregas" || $url[0] == "Reportes" || $url[0] == "ReportesExcel"
        ) {
          include "modulos/" . $url[0] . ".php";
        }
      } 

      echo '</div>';
    } else if (isset($_GET["url"])) {

      if ($_GET["url"] == "Ingresar") {

        include "modulos/Ingresar.php";
      } else if ($_GET["url"] == "Crear-Cuenta") {

        include "modulos/Crear-Cuenta.php";
      } else {
        include "modulos/Ingresar.php";
      }
    } else {

      include "modulos/Ingresar.php";
    }


    ?>




  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="http://localhost/Aulas/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://localhost/Aulas/Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="http://localhost/Aulas/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="http://localhost/Aulas/Vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="http://localhost/Aulas/Vistas/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="http://localhost/Aulas/Vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->

  <!-- jQuery Knob Chart -->
  <script src="http://localhost/Aulas/Vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="http://localhost/Aulas/Vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="http://localhost/Aulas/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="http://localhost/Aulas/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="http://localhost/Aulas/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="http://localhost/Aulas/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script src="http://localhost/Aulas/Vistas/bower_components/ckeditor/ckeditor.js"></script>

  <script src="http://localhost/Aulas/Vistas/bower_components/select2/dist/js/select2.full.min.js"></script>

  <script src="http://localhost/Aulas/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>

  <script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>




  <script src="http://localhost/Aulas/Vistas/js/usuarios.js"></script>

  <script src="http://localhost/Aulas/Vistas/js/aulas.js"></script>

  <script src="http://localhost/Aulas/Vistas/js/secciones.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</body>

</html>