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



<div class="content-wrapper">

    <section class="content-header">

        <?php
        echo '<h1>Entregas:<b>' . $tarea["nombre"] . '</b></h1>
      <h2>Fecha Limite:<b>' . $tarea["fecha_limite"] . '</b></h2>';

        ?>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <table class="table table-hover table-striped table-bordered dt--responsive">

                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Tarea</th>
                            <th></th>


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
                            <td>' . $alumno["apellido"] . ' ' . $alumno["nombre"] . '</td>

                            <td><a href="http://localhost/Aulas/' . $value["tarea_alumno"] . '" download="' . $alumno["apellido"] . '">Descargar</a></td>';

                            $notas = TareasC::VerNotasC();

                            foreach ($notas as $key => $nota) {
                                if ($nota["id_entrega"] == $value["id"]) {
                                    echo '<td>
                                    
                                    <form method="post">
                                         <div class="col-md-2">
                                              Nota:<input type="text" name="nota" style="width:100%" required value="' . $nota["nota"] . '">

                                              <input type="hidden" name="id" value="' . $nota["id"] . '">
                                              <input type="hidden" name="id_seccion" value="' . $seccion["id"] . '">

                                              <input type="hidden" name="id_tarea" value="' . $exp[1] . '">

                                              
                                         </div>

                                         <div class="col-md-4">
                                              Estado:<select required name="estado" style="width:100%">
                                              <option value="'.$nota["estado"].'">'.$nota["estado"].'</option>
                                              <option value="Aprobado">Aprobado</option>
                                              <option value="Reprobado">Reprobado</option>
                                              <option value="Pendiente">Pendiente</option>

                                              </select>
                                         </div>

                                         <br>
                                         <button type="submit" class="btn btn-success btn-xs">Actualizar</button>
                                    </form>
                                    </td>';
                                }
                            }

                            echo '</tr>';
                        }

                        $CambiarNota = new TareasC;
                        $CambiarNota -> CambiarNotaC();


                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </section>
</div>