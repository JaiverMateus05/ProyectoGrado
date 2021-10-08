<div class="content-wrapper">

    <section class="content-header">

        <?php
        $exp = explode("/", $_GET["url"]);

        $aula = AulasC::VerAulasC();

        foreach($aula as $key => $value){
            if($value["id"] == $exp[1]){
                echo '<h1>No te encuentras incrito en el aula:<b>'.$value["materia"].'</b></h1>
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