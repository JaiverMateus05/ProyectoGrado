<?php

class AlumnosC{

    public function InscribirmeC(){
        if(isset($_POST["id_alumno"])){
            $tablaBD = "inscripciones";

            $datosC = array("id_alumno"=>$_POST["id_alumno"],"id_aula"=>$_POST["id_aula"]);

            $resultado = AlumnosM::InscribirmeM($tablaBD, $datosC);

            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/Aulas/Aula/'.$_POST["id_aula"].'";
                </script>
                ';
            }
        }
    }

    public function DarBajaC(){
        if(isset($_POST["id_aula"])){
            $tablaBD = "inscripciones";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_aula"=>$_POST["id_aula"]);

            $resultado = AlumnosM::DarBajaM($tablaBD, $datosC);
            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/Aulas/Aulas-Virtuales";
                </script>
                ';
            }
        }
    }
}


?>