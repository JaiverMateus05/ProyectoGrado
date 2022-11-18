<?php
ob_start();
?>


<html lang="en">
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

    echo '<script>
        
        window.location = "http://localhost/Aulas/Aulas-Virtuales";
        </script>';
}
?>


<!-- <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->

<div class="content-wrapper">
<section class="content-header">

        <?php
        echo '<h1>Reporte Notas:<b>' . $tarea["nombre"] . '</b></h1>';
        ?>
    </section>
    
        

            <table width=100% class="border-collapse">

                <thead>
                    <tr>
                        <th class="service">Alumno</th>
                        <th text-align="center">Nota</th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    $columna = "id_tarea";
                    $valor = $exp[1];
                    $resultado = TareasC::VerEntregasC($columna, $valor);
                    foreach ($resultado as $key => $value) {
                        $columna = "id";
                        $valor = $value["id_alumno"];
                        $alumno = UsuariosC::VerUsuariosC($columna, $valor);
                        echo '
        
        <tr>
        <td>' . $alumno["apellido"] . ' ' . $alumno["nombre"] . '</td>';

                        $notas = TareasC::VerNotasC();

                        foreach ($notas as $key => $nota) {
                            if ($nota["id_entrega"] == $value["id"]) {
                                echo '
                
           
                          <td text-align="center">' . $nota["nota"] . ' </td>

                          <input type="hidden" name="id" value="' . $nota["id"] . '">
                          <input type="hidden" name="id_seccion" value="' . $seccion["id"] . '">

                          <input type="hidden" name="id_tarea" value="' . $exp[1] . '">';
                            }
                        }

                        echo '</tr>';
                    }




                    ?>
                </tbody>
            </table>


        
</div>
</html>
<?php
$html=ob_get_clean();
//echo $html;

require_once 'C:/xampp/htdocs/Aulas/libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$html=ob_end_clean();
$dompdf->stream("reporte_.pdf", array("Attachment" => false));

?>
