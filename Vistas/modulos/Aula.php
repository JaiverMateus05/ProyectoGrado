<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$aula = AulasC::VerAulas2C($columna, $valor);

?>

<div class="content-wrapper">

    <section class="content-header">
        <?php
        echo '<h1>Aula Virtual de la materia: <b>' . $aula["materia"] . '</b></h1>';

        ?>
    </section>

    <section class="content">
        <?php
        echo '<form method="post">

           <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
           <input type="hidden" name="id_aula" value="'.$exp[1].'">

           <button type="submit" class="btn btn-danger">Cancelar Inscripcion</button>

           </form>';

           $darbaja = new AlumnosC();
           $darbaja -> DarBajaC();
        ?>
    </section>
</div>