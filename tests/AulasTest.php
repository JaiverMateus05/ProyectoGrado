<?php 

require_once 'Controladores/aulasC.php';
require_once 'Modelos/aulasM.php';

use PHPUnit\Framework\TestCase;

class AulasTest extends TestCase
{

    /* private $AUM;

    public function setUp():void{
        $this->AUM = new AulasM();
    } */
    
    public function testCrearAula(){
        $aulasM = new AulasM();

        $tablaBD = "a";
        $datosC=[];
        
        $result = $aulasM ->CrearAulaM($tablaBD,$datosC);

            $this->assertNull($result);     }


    public function testVerAula(){
        $aulasM = new AulasM();

        $tablaBD = "a";
      
        
        $result = $aulasM ->VerAulasM($tablaBD);

            $this->assertIsArray($result);     }

}