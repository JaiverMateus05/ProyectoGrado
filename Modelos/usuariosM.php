<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD
{


    static public function IniciarSesionM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();



        $pdo = null;
    }
    static public function VerPerfilM($tablaBD, $id)
    {
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = $id");

        $pdo->execute();

        return $pdo->fetch();

        $pdo = null;
    }

    static public function EditarPerfilM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET clave = :clave, nombre = :nombre, apellido = :apellido, documento = :documento, foto = :foto WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo = null;
    }

    static public function CrearUsuarioM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, apellido, documento, rol,usuario, clave, id_carrera) 
        VALUES(:nombre, :apellido, :documento, :rol,:usuario, :clave, :id_carrera)");

        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo = null;
    }


    static public function VerUsuariosM($tablaBD,$columna, $valor)
    {

        if($columna == null){
             $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo->execute();

        return $pdo->fetchAll();
        }else{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna,$valor,PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();
        }
       

        $pdo = null;
    }

    static public function ActualizarUsuarioM($tablaBD,$datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET clave = :clave, nombre = :nombre, apellido = :apellido, documento = :documento, rol = :rol WHERE id = :id");

        $pdo ->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo ->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo ->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo ->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo ->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo ->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo = null;
    }

    static public function BorrarUsuarioM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }
        $pdo = null;
    }
}
