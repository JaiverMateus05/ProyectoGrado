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

            $pdo -> bindParam(":" .$columna, $valor, PDO::PARAM_INT);

            $pdo -> execute();

            return $pdo -> fetch();
        }

        $pdo = null;
    }

    static public function EditarNombreSM($tablaBD,$datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id_seccion"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;
    }

    static public function EditarDescripcionSM($tablaBD,$datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET descripcion = :descripcion WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id_seccion"], PDO::PARAM_INT);
        $pdo -> bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;
    }

    static public function AgregarArchivoM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, id_seccion, archivo) VALUES(:nombre, :id_seccion, :archivo)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_STR);
        $pdo -> bindParam(":archivo", $datosC["archivo"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo = null;
    }
    
    static public function VerArchivosM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo ->execute();

        return $pdo ->fetchAll();

        $pdo = null;

    }

    static public function borrarArchivoM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarTareaM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarTareasM($tablaBD2, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD2 WHERE id_tarea = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarEntregasM($tablaBD3, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD3 WHERE id_tarea = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarNotaM($tablaBD4, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD4 WHERE id_tarea = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }





    static public function BorrarTarea2M($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_seccion = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarTareas2M($tablaBD2, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD2 WHERE id_seccion = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarEntregas2M($tablaBD3, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD3 WHERE id_seccion = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarNota2M($tablaBD4, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD4 WHERE id_seccion = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarArchivo2M($tablaBD5, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD5 WHERE id_seccion = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }

    static public function BorrarSeccionM($tablaBD6, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD6 WHERE id = $id");

        if($pdo->execute()){
            
            return true;
        }

        $pdo = null;
    }
}

?>