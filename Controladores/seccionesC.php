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

        /* if(isset($_POST["nombreA"])){
            $rutaArchivo = "";

            if($_FILES["archivo"]["type"] == "application/pdf"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".pdf";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".doc";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".xlsx";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "image/jpeg"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".jpeg";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "image/jpg"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".jpg";

                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }
            if($_FILES["archivo"]["type"] == "image/png"){

                $nombre = mt_rand(10, 999);

                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".png";

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
        } */
        if(isset($_POST["nombreA"])){

            $archivo = $_FILES['archivo'];

            $ANombre = $_FILES['archivo']['name'];
            $ATmpnombre = $_FILES['archivo']['tmp_name'];
            $ATamaño = $_FILES['archivo']['size'];
            $AError = $_FILES['archivo']['error'];
            $ATipo = $_FILES['archivo']['type'];

            $fileExt = explode('.', $ANombre);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png','pdf', 'xls','docx', 'xlsx', 'pptx', 'gns3');

            if(in_array($fileActualExt, $allowed)){
                if($AError === 0){
                    if($ATamaño < 50000000){
                        $nombre = mt_rand(10, 999).".".$fileActualExt;
                        $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre;
                        move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);

                        $tablaBD = "archivos";

                        $datosC = array("nombre"=>$_POST["nombreA"], "id_seccion"=>$_POST["id_s"], "archivo"=>$rutaArchivo);
            
                        $resultado = SeccionesM::AgregarArchivoM($tablaBD, $datosC);
            
                        if($resultado == true){
                            echo '<script>
                            
                            window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                            
                            </script>';
                        }

                    }else{
                        echo '<script>
                        swal({
                            type: "warning",
                            title: "El archivo es demasiado grande",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                        </script>';
                    }

                }else{
                    '<script>
                        swal({
                            type: "warning",
                            title: "Hubo un error subiendo tu archivo",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
                        </script>';
                    
                }

            }else{
                echo '<script>
                        swal({
                            type: "warning",
                            title: "No puedes subir archivos de este tipo",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        })
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

    public function BorrarTareaC(){
        if(isset($_POST["idT"])){
            $tablaBD = "tareas";

            $id = $_POST["idT"];

            $resultado = SeccionesM::BorrarTareaM($tablaBD, $id);

            $tablaBD2= "tarea";
            $resultado2 =SeccionesM::BorrarTareasM($tablaBD2, $id);

            $dirT = "Vistas/Tareas";
            foreach(glob($dirT."/*-".$id."-*.*") as $tareas){

                unlink($tareas);
            }
            $tablaBD3= "entregas";
            $resultado3 =SeccionesM::BorrarEntregasM($tablaBD3, $id);

            $dirE = "Vistas/Entregas";
            foreach(glob($dirE."/*-".$id."-*.*") as $entregas){

                unlink($entregas);
            }
            $tablaBD4 ="notas";
            $resultado4 = SeccionesM::BorrarNotaM($tablaBD4,$id);

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$_POST["idAula"].'";
                
                </script>';
            }
        }
    }

    public function BorrarSeccionC(){

        if(isset($_POST["idS"])){
            $tablaBD = "tareas";

            $id = $_POST["idS"];

            $resultado = SeccionesM::BorrarTarea2M($tablaBD, $id);

            $tablaBD2= "tarea";
            $resultado2 =SeccionesM::BorrarTareas2M($tablaBD2, $id);

            $dirT = "Vistas/Tareas";
            foreach(glob($dirT."/".$id."-*-*.*") as $tareas){

                unlink($tareas);
            }
            $tablaBD3= "entregas";
            $resultado3 =SeccionesM::BorrarEntregas2M($tablaBD3, $id);

            $dirE = "Vistas/Entregas";
            foreach(glob($dirE."/".$id."-*-*.*") as $entregas){

                unlink($entregas);
            }
            $tablaBD4 ="notas";
            $resultado4 = SeccionesM::BorrarNota2M($tablaBD4,$id);

            $tablaBD5 = "archivos";
            $resultado5 = SeccionesM::BorrarArchivo2M($tablaBD5, $id);

            $tablaBD6 = "secciones";
            $resultado6 = SeccionesM::BorrarSeccionM($tablaBD6, $id);

            $dirA = "Vistas/Archivos";
            foreach(glob($dirA."/".$id."-*.*") as $archivos){

                unlink($archivos);
            }

            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                
                </script>';
            }
        }
    }
}


?>