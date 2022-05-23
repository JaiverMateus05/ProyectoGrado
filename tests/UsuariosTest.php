<?php 

require_once 'Controladores/usuariosC.php';
require_once 'Modelos/usuariosM.php';

use PHPUnit\Framework\TestCase;

class UsuariosTest extends TestCase
{

    /* private $USM;

    public function setUp():void{
        $this->USM = new UsuariosM();
    } */
    
    public function testCrearUsuario(){
        $usuariosM = new UsuariosM();

        $tablaBD = "a";
        $datosC=[];
        
        $result = $usuariosM ->CrearUsuarioM($tablaBD,$datosC);

            $this->assertNull($result);    }


    public function testEditarPerfil(){
        $usuariosM = new UsuariosM();

        $tablaBD = "a";
        $datosC=[];
        
        $result = $usuariosM ->EditarPerfilM($tablaBD,$datosC);

            $this->assertNull($result);     }

}