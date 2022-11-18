<?php 
header("Content-Type: application/xls");
header("Content-Disposition: attachmen; filename= reporte.xls");

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

?>




<div class="content-wrapper">
<section class="content-header">

        <?php
        echo '<h1>Reporte Notas:<b>' . $tarea["nombre"] . '</b></h1>
      
      
      ';

        ?>
    </section>
    <div class="box">

        <div class="box-body">
        

            <table class="table table-hover table-striped table-bordered dt--responsive">

                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Nota</th>
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
                
           
                          <td>' . $nota["nota"] . ' </td>

                          <input type="hidden" name="id" value="' . $nota["id"] . '">
                          <input type="hidden" name="id_seccion" value="' . $seccion["id"] . '">

                          <input type="hidden" name="id_tarea" value="' . $exp[1] . '">

                          
                     
                ';
                            }
                        }

                        echo '</tr>';
                    }




                    ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
</html>