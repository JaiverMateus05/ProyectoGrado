<?php

require_once "ConexionBD.php";

class SeccionesM extends ConexionBD{

    static public function CrearSeccionM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_aula, nombre) VALUES (:id_aula, :nombre)");

        $pdo -> bindParam(":id_aula", $datosC["id_aula"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;
    }

    static public function VerSeccionesM($tablaBD,$columna,$valor){
        if($columna == null){
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            return $pdo -> fetchAll();

            
        }else{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":", $columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo -> fetch();
        }

        $pdo = null;
    }
}

?>