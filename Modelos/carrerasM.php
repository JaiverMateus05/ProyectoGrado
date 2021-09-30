<?php 

require_once "ConexionBD.php";

class CarrerasM extends ConexionBD{
    static public function CrearCarreraM($tablaBD, $carrera){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;
    }


    static public function VerCarrerasM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;
    }

    static public function EditarCarreraM($tablaBD,$id){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = $id");

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo = null;
    }

    static public function ActualizarCarreraM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["carrera"], PDO::PARAM_STR);

        if($pdo ->execute()){
            return true;
        }
        $pdo = null;

    }

    static public function BorrarCarreraM($tablaBD, $id){
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id");
        if($pdo ->execute()){
            return true;
        }
        $pdo = null;
    }
}


?>