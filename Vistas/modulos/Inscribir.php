<?php
$exp = explode("/", $_GET["url"]);

$columna = "id_aula";
$valor = $exp[1];

$insc = AlumnosC::VerInscritosC($columna, $valor);

foreach($insc as $key => $value){
    if($value["id_aula"] == $exp[1] && $value["id_alumno"] == $_SESSION["id"]){
        echo'<script>
        
        window.location = "http://localhost/Aulas/Aula/'.$exp[1].'";
        </script>';
    }
}


?>


<div class="content-wrapper">

    <section class="content-header">

        <?php
        

        $aula = AulasC::VerAulasC();

        foreach($aula as $key => $value){
            if($value["id"] == $exp[1]){
                echo '<h1>No te encuentras inscrito en el aula:<b>'.$value["materia"].'</b></h1>
                <br>';

                echo '<form method="post">
                <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                <input type="hidden" name="id_aula" value="'.$exp[1].'">
    
                <button class="btn btn-primary" type="submit">Inscribir</button>
            </form>';
            }
        }

        $inscribir = new AlumnosC();
        $inscribir -> InscribirmeC();
        ?>

        
    </section>


</div>