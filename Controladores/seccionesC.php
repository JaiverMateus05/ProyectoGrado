<?php

class SeccionesC{


    public function CrearSeccionC(){
        if(isset($_POST["id_aula"])){
            $tablaBD = "secciones";

            $datosC = array("id_aula"=>$_POST["id_aula"], "nombre"=>"Nueva Seccion");

            $resultado = SeccionesM::CrearSeccionM($tablaBD, $datosC);

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$_POST["id_aula"].'";
                
                </script>';
            }
        }
    }

    static public function VerSeccionesC($columna,$valor){
        $tablaBD = "secciones";

        $resultado = SeccionesM::VerSeccionesM($tablaBD,$columna,$valor);

        return $resultado;
    }
}


?>