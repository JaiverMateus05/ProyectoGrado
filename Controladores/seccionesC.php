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

    public function EditarNombreSC(){
        if(isset($_POST["id_seccion"])){
            $tablaBD = "secciones";

            $exp = explode("/" , $_GET["url"]);

            $datosC = array("id_seccion"=>$_POST["id_seccion"], "nombre"=>$_POST["nombre"]);

            $resultado = SeccionesM::EditarNombreSM($tablaBD,$datosC);

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$exp[1].'";
                
                </script>';
            }
        }
    }

    public function EditarDescripcionSC(){
        if(isset($_POST["id_aula"])){
            $tablaBD = "secciones";

            $exp = explode("/" , $_GET["url"]);
            
            $datosC = array("id_seccion"=>$exp[1], "descripcion"=>$_POST["descripcion"]);

            $resultado = SeccionesM::EditarDescripcionSM($tablaBD,$datosC);

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$_POST["id_aula"].'";
                
                </script>';
            }
        }
    }

    public function  AgregarArchivoC(){

        if(isset($_POST["nombreA"])){
            $rutaArchivo = "";

            if($_FILES["archivo"]["type"] == "application/pdf"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$nombre.".pdf";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$nombre.".doc";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$nombre.".xlsx";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }

            $tablaBD = "archivos";

            $datosC = array("nombre"=>$_POST["nombreA"], "id_seccion"=>$_POST["id_s"], "archivo"=>$rutaArchivo);

            $resultado = SeccionesM::AgregarArchivoM($tablaBD, $datosC);

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                
                </script>';
            }
        }
    }

    static public function VerArchivosC($columna, $valor){
        $tablaBD = "archivos";

        $resultado = SeccionesM::VerArchivosM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function borrarArchivoC(){

        if(isset($_POST["id"])){

            $tablaBD = "archivos";

            $id = $_POST["id"];

            unlink($_POST["archivo"]);

            $resultado = SeccionesM::borrarArchivoM($tablaBD, $id);

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                
                </script>';
            }
        }
    }
}


?>