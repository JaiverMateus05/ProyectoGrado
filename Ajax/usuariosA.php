<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA{


    public $VerificarUsuario;

    public function VerificarUsuario(){
        $columna = "usuario";
        $valor = $this->VerificarUsuario;

        $resultado = UsuariosC::VerUsuariosC($columna,$valor);

        echo json_encode($resultado);
        
        
    }

    public $Uid;

    public function EditarUsuariosA(){
        $columna = "id";
        $valor = $this->Uid;
        $resultado = UsuariosC::VerUsuariosC($columna,$valor);
        echo json_encode($resultado);
    }
}

if(isset($_POST["VerificarUsuario"])){
    $verificar = new UsuariosA();
    $verificar -> VerificarUsuario = $_POST["VerificarUsuario"];
    $verificar -> VerificarUsuario();
}

if(isset($_POST["Uid"])){

    $editar = new UsuariosA();
    $editar -> Uid = $_POST["Uid"];
    $editar -> EditarUsuariosA();
}