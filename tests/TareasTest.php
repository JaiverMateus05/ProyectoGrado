<?php 

require_once 'Controladores/tareasC.php';
require_once 'Modelos/tareasM.php';

use PHPUnit\Framework\TestCase;

class TareasTest extends TestCase
{

    /* private $TAM;

    public function setUp():void{
        $this->TAM = new TareasM();
    } */
    
    public function testAgregarTarea(){
        $tareasM = new TareasM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $tareasM ->AgregarTareaM($tablaBD,$datosC);

            $this->assertNull($result);    }


    public function testVerTarea(){

        $tareasM = new TareasM();

        $tablaBD = "a";
        $columna= "k";
        $valor=1;
        
        $result = $tareasM ->verTareasM($tablaBD,$columna, $valor);

            $this->assertIsArray($result);   }


    public function testGuardarTarea(){
        $tareasM = new TareasM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $tareasM ->GuardarTareaM($tablaBD,$datosC);

            $this->assertNull($result);    }


    public function testEntregarTarea(){
        $tareasM = new TareasM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $tareasM ->EntregarTareaM($tablaBD,$datosC);

            $this->assertNull($result);    }

    
    public function testCrearNotaTarea(){
        $tareasM = new TareasM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $tareasM ->CrearNotaM($tablaBD,$datosC);

            $this->assertNull($result);    }

}