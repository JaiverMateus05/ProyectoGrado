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

<div class="content-wrapper">

    <section class="content-header">
        <?php
        echo '<h1>Aula Virtual de la materia: <b>' . $aula["materia"] . '</b></h1>';

        ?>
    </section>

    <section class="content">
        <?php

        if ($_SESSION["rol"] == "Profesor") {

            echo '<a href="http://localhost/Aulas/Inscritos/'.$exp[1].'">
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
    </section>
</div>