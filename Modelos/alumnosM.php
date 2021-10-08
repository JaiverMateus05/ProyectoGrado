<?php

require_once "ConexionBD.php";

class AlumnosM extends ConexionBD{
    static public function InscribirmeM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_alumno, id_aula) VALUES (:id_alumno,:id_aula) ");

        $pdo -> bindParam(":id_aula", $datosC["id_aula"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);

        if($pdo ->execute()){
            return true;
        }

        $pdo = null;
    }

    static public function DarBajaM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_alumno = :id_alumno AND id_aula = :id_aula");
        $pdo -> bindParam(":id_aula", $datosC["id_aula"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);

        if($pdo ->execute()){
            return true;
        }

        $pdo = null;

    }

    static public function VerInscritosM($tablaBD, $columna, $valor){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna,$valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;
    }

    static public function VerInscritoM($tablaBD,$columna,$valor,$columna2,$valor2){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND $columna = :$columna2");
        $pdo -> bindParam(":".$columna,$valor, PDO::PARAM_STR);
        $pdo -> bindParam(":".$columna2,$valor2, PDO::PARAM_STR);
        $pdo -> execute();

        return $pdo -> fetch();

        $pdo = null;

    }
}

?>