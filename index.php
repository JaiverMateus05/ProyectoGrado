<?php

require_once "Controladores/plantillaC.php";


require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";

require_once "Controladores/aulasC.php";
require_once "Modelos/aulasM.php";

require_once "Controladores/alumnosC.php";
require_once "Modelos/alumnosM.php";

require_once "Controladores/seccionesC.php";
require_once "Modelos/seccionesM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();