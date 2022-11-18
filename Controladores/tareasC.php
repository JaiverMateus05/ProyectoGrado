<?php

class TareasC{

    public function AgregarTareaC(){

        if(isset($_POST["idSeccion"])){

            $tablaBD = "tareas";

            $datosC = array("id_seccion"=>$_POST["idSeccion"], "nombre"=>"Nueva Tarea");

            $resultado = TareasM::AgregarTareaM($tablaBD, $datosC);

            if($resultado == true){

                $resultado2 = TareasM::VerTareaIdM($tablaBD);

                echo '<script>
                
                
                window.location = "http://localhost/Aulas/Tarea/'.$resultado2["id"].'";
                </script>';
            }
        }
    }

    static public function VerTareasC($columna, $valor){
        $tablaBD = "tareas";

        $resultado = TareasM::VerTareasM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function VerTareaC($columna, $valor){
        $tablaBD = "tareas";

        $resultado = TareasM::VerTareaM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function GuardarTareaC(){

        if(isset($_POST["id"])){
            $tablaBD = "tareas";

            $datosC = array("id"=>$_POST["id"],"nombre"=>$_POST["nombre"], "fecha_limite"=>$_POST["fecha_limite"], "descripcion"=>$_POST["descripcion"]);

            $resultado = TareasM::GuardarTareaM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                
                window.location = "http://localhost/Aulas/Tarea/'.$_POST["id"].'";
                </script>';
            }
        }
    }

    public function SubirTareaC(){
        if(isset($_POST["nombre"])){

            $tarea = $_FILES['tarea'];

            $ANombre = $_FILES['tarea']['name'];
            $ATmpnombre = $_FILES['tarea']['tmp_name'];
            $ATamaño = $_FILES['tarea']['size'];
            $AError = $_FILES['tarea']['error'];
            $ATipo = $_FILES['tarea']['type'];

            $fileExt = explode('.', $ANombre);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'docx', 'xlsx', 'pptx', 'gns3','pdf', 'xls');

            if(in_array($fileActualExt, $allowed)){
                if($AError === 0){
                    if($ATamaño < 500000){
                        $tarea = mt_rand(10, 999).".".$fileActualExt;
                        $rutaArchivo = "Vistas/Tareas/".$_POST["id_seccion"]."-".$_POST["id_tarea"]."-".$tarea;
                        move_uploaded_file($_FILES["tarea"]["tmp_name"], $rutaArchivo);

                        $tablaBD = "tarea";

                        $datosC = array("nombre"=>$_POST["nombre"], "id_tarea"=>$_POST["id_tarea"], "id_seccion"=>$_POST["id_seccion"], "tarea"=> $rutaArchivo);
            
                        $resultado = TareasM::SubirTareaM($tablaBD, $datosC);
            
                        if($resultado == true){
            
                            echo '<script>
                            
                            window.location = "http://localhost/Aulas/Tarea/'.$_POST["id_tarea"].'";
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

    static public function GuardarCambiosC(){
        if(isset($_POST["id"])){
            $tablaBD = "tareas";

            $datosC = array("id"=>$_POST["id"],"nombre"=>$_POST["nombre"], "fecha_limite"=>$_POST["fecha_limite"], "descripcion"=>$_POST["descripcion"]);

            $resultado = TareasM::GuardarCambiosM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                
                window.location = "http://localhost/Aulas/Tarea/'.$_POST["id"].'";
                </script>';
            }
        }
            if(isset($_POST["nombre"])){

            $tarea = $_FILES['tarea'];

            $ANombre = $_FILES['tarea']['name'];
            $ATmpnombre = $_FILES['tarea']['tmp_name'];
            $ATamaño = $_FILES['tarea']['size'];
            $AError = $_FILES['tarea']['error'];
            $ATipo = $_FILES['tarea']['type'];

            $fileExt = explode('.', $ANombre);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'docx', 'xlsx', 'pptx', 'gns3','pdf', 'xls');

            if(in_array($fileActualExt, $allowed)){
                if($AError === 0){
                    if($ATamaño < 50000000){
                        $tarea = mt_rand(10, 999).".".$fileActualExt;
                        $rutaArchivo = "Vistas/Tareas/".$_POST["id_seccion"]."-".$_POST["id_tarea"]."-".$tarea;
                        move_uploaded_file($_FILES["tarea"]["tmp_name"], $rutaArchivo);

                        $tablaBD = "tarea";

                        $datosC = array("nombre"=>$_POST["nombre"], "id_tarea"=>$_POST["id_tarea"], "id_seccion"=>$_POST["id_seccion"], "tarea"=> $rutaArchivo);
            
                        $resultado = TareasM::GuardarCambiosM($tablaBD, $datosC);
            
                        if($resultado == true){
            
                            echo '<script>
                            
                            window.location = "http://localhost/Aulas/Tarea/'.$_POST["id_tarea"].'";
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
    static public function VerTC($columna, $valor){
        $tablaBD = "tarea";

        $resultado = TareasM::VerTM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function EntregarTareaC(){
       

        if(isset($_POST["id_tarea"])){

            $tarea_alumno = $_FILES['tarea_alumno'];

            $ANombre = $_FILES['tarea_alumno']['name'];
            $ATmpnombre = $_FILES['tarea_alumno']['tmp_name'];
            $ATamaño = $_FILES['tarea_alumno']['size'];
            $AError = $_FILES['tarea_alumno']['error'];
            $ATipo = $_FILES['tarea_alumno']['type'];

            $fileExt = explode('.', $ANombre);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'docx', 'xlsx', 'pptx', 'gns3','pdf', 'xls');

            if(in_array($fileActualExt, $allowed)){
                if($AError === 0){
                    if($ATamaño < 50000000){
                        $tarea_alumno = mt_rand(10, 999).".".$fileActualExt;
                        $rutaArchivo = "Vistas/Entregas/".$_POST["id_seccion"]."-".$_POST["id_tarea"]."-".$tarea_alumno;
                        move_uploaded_file($_FILES["tarea_alumno"]["tmp_name"], $rutaArchivo);

                        $tablaBD = "entregas";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_tarea"=>$_POST["id_tarea"], "id_seccion"=>$_POST["id_seccion"], "tarea_alumno"=> $rutaArchivo);

            $resultado = TareasM::EntregarTareaM($tablaBD, $datosC);
            $resultado2 = TareasM::VerEntregaIDM($tablaBD);

            $tablaBD2 = "notas";

            $datosC2 = array("id_entrega" =>$resultado2["id"], "estado"=>"Pendiente" , "id_tarea"=>$_POST["id_tarea"] , "id_seccion"=>$_POST["id_seccion"]);

            $resultado3 = TareasM::CrearNotaM($tablaBD2,$datosC2);

            if($resultado == true){

                echo '<script>
                swal({

                    type: "success",
                    title: "Sus Tarea ha sido enviada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then(function(resultado){
                if(resultado.value){
                      window.location = "http://localhost/Aulas/Tarea/'.$_POST["id_tarea"].'";
                }
                })
                
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

    static public function VerEntregasC($columna, $valor){

        $tablaBD = "entregas";

        $resultado = TareasM::VerEntregasM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function VerNotasC(){
        $tablaBD = "notas";

        $resultado = TareasM::VerNotasM($tablaBD);
        return $resultado;


    }

    public function CambiarNotaC(){
        if(isset($_POST["nota"])){

            $tablaBD = "notas";

            $datosC = array("id"=>$_POST["id"], "nota"=>$_POST["nota"],"estado"=>$_POST["estado"]);

            $resultado = TareasM::CambiarNotaM($tablaBD, $datosC);

            if($resultado == true){
                echo '<script>
                window.location="http://localhost/Aulas/Entregas/'.$_POST["id_tarea"].'";
                </script>';
            }
        }
    }
}

?>