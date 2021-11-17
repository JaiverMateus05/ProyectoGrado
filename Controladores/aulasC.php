<?php

class AulasC{

    public function CrearAulaC(){
        if(isset($_POST["materia"])){
            $tablaBD = "aulas";

            $exp = explode("/", $_GET["url"]);

            $datosC = array();

            $datosC = array("materia"=>$_POST["materia"], "id_carrera"=>$_POST["id_carrera"], "id_profesor"=>$_POST["id_profesor"]);

            $resultado = AulasM::CrearAulaM($tablaBD,$datosC);

            if($resultado == true){
                echo '<script>
                swal({

                    type: "success",
                    title: "El aula se ha creado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then(function(resultado){
                if(resultado.value){
                      window.location = "http://localhost/Aulas/'.$exp[0].'";
                }
                })
                
                </script>';
            }
        }
    }

    public function VerAulasC(){
        $tablaBD = "aulas";
        $resultado = AulasM::VerAulasM($tablaBD);
        return $resultado;
    }

    static public function VerAulas2C($columna, $valor){
        $tablaBD = "aulas";
        $resultado = AulasM::VerAulas2M($tablaBD,$columna, $valor);
        return $resultado;
    }

    public function BorrarAulaC(){

        if(isset($_GET["Aid"])){
            $tablaBD = "aulas";

            $id = $_GET["Aid"];

            $resultado = AulasM::BorrarAulaM($tablaBD,$id);

            if($resultado == true){
                echo '<script>
                
                window.location = "Aulas";
                </script>';
            }
        }
    }

}

?>