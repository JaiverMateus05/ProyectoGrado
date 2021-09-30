<?php
if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
    window.location="Inicio";
    
    </script>';

    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Estudiantes</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <table class="table table-hover table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Carrera</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $exp = explode("/",$_GET["url"]);
                        $columna = null;
                        $valor = null;

                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

                        foreach ($resultado as $key => $value) {

                            if(isset($exp[1])){
                                if($value["id_carrera"]== $exp[1]){
                                    echo '
                                    <tr>
    
                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["documento"].'</td>';
    
                                    $carrera = CarrerasC::VerCarrerasC();
    
                                    foreach($carrera as $key => $c){
                                        if($c["id"] == $value["id_carrera"]){
                                            echo '<td>'.$c["nombre"].'</td>';
                                        }
                                    }
                                    echo '<td>'.$value["usuario"].'</td>
                                    <td>'.$value["clave"].'</td>
    
                                    ';
                                }

                            }else{

                                if($value["rol"]== "Estudiante"){
                                echo '
                                <tr>

                                <td>'.$value["apellido"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["documento"].'</td>';

                                $carrera = CarrerasC::VerCarrerasC();

                                foreach($carrera as $key => $c){
                                    if($c["id"] == $value["id_carrera"]){
                                        echo '<td>'.$c["nombre"].'</td>';
                                    }
                                }
                                echo '<td>'.$value["usuario"].'</td>
                                <td>'.$value["clave"].'</td>

                                ';
                            }
                            }

                            
                        }
                        ?>
                    </tbody>

                </table>


            </div>
        </div>
    </section>
</div>