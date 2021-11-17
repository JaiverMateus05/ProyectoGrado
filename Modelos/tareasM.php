<?php

require_once "ConexionBD.php";

class TareasM extends ConexionBD{

    static public function AgregarTareaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, id_seccion) VALUES (:nombre, :id_seccion)");

        $pdo -> bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo = null;

    }

    static public function VerTareaIdM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT MAX(id) AS id FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo = null;

    }

    static public function VerTareasM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":" .$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;
    }

    static public function VerTareaM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":" .$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();
        
        $pdo = null;
    }

    static public function GuardarTareaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fecha_limite = :fecha_limite, nombre = :nombre, descripcion = :descripcion WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":fecha_limite", $datosC["fecha_limite"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo = null;
    }

    static public function SubirTareaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, id_tarea, tarea, id_seccion) VALUES (:nombre, :id_tarea, :tarea, :id_seccion)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_tarea", $datosC["id_tarea"], PDO::PARAM_INT);
        $pdo -> bindParam(":tarea", $datosC["tarea"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_STR);


        if($pdo -> execute()){
            return true;
        }

        $pdo = null;

    }

    static public function VerTM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;

    }

    static public function EntregarTareaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_alumno, id_tarea, tarea_alumno, id_seccion) VALUES (:id_alumno, :id_tarea, :tarea_alumno, :id_seccion)");

        $pdo -> bindParam(":id_tarea", $datosC["id_tarea"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":tarea_alumno", $datosC["tarea_alumno"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_STR);


        if($pdo -> execute()){
            return true;
        }

        $pdo = null;

    }

    static public function VerEntregaIDM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT MAX(id) AS id FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo = null;
    }

    static public function CrearNotaM($tablaBD2,$datosC2){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD2 (id_entrega, estado, id_tarea, id_seccion ) VALUES (:id_entrega, :estado, :id_tarea, :id_seccion)");

        $pdo -> bindParam(":id_entrega", $datosC2["id_entrega"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC2["estado"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_tarea", $datosC2["id_tarea"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_seccion", $datosC2["id_seccion"], PDO::PARAM_STR);



        if($pdo -> execute()){
            return true;
        }

        $pdo = null;
    }

    static public function VerEntregasM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY id DESC");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

           $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;

    }

    static public function VerNotasM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;
    }

    static public function CambiarNotaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nota = :nota, estado = :estado WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nota", $datosC["nota"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo = null;
    }
}


?>