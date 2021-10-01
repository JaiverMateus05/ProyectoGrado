<?php

require_once "ConexionBD.php";


class AulasM extends ConexionBD{

    static public function CrearAulaM($tablaBD,$datosC){


        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(materia, id_carrera, id_profesor)VALUES(:materia, :id_carrera, :id_profesor)");
   $pdo -> bindParam(":materia",$datosC["materia"],PDO::PARAM_STR);
   $pdo -> bindParam(":id_carrera",$datosC["id_carrera"],PDO::PARAM_INT);
   $pdo -> bindParam(":id_profesor",$datosC["id_profesor"],PDO::PARAM_INT);

   if($pdo->execute()){
       return true;
   }
   $pdo = null;
    }

    static public function VerAulasM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo = null;
    }

    static public function BorrarAulaM($tablaBD,$id){
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id");

        if($pdo->execute()){
            return true;
        }
        $pdo = null;
    }


}

?>