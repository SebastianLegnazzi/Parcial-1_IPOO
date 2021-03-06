<?php

/**************************************/
/********* INCLUIMOS CLASES ***********/
/**************************************/

include("Responsable.php");
include("Viaje.php");
include("Empresa.php");
include("Terminal.php");

/**************************************/
/********* CREAMOS OBJETOS ************/
/**************************************/
$objResponsableFBSRL = [new Responsable("Enrique","Iglesias",25879441,"Luis Beltran 780, Cipoletti, Rio Negro","ElEnriquesito@gmail.com",29943978741), 
                        new Responsable("Mariana","Maidana",38457894,"AV. Argentina 200, Neuquen, Neuquen","Marianita20@gmail.com",29957867415)];

$objResponsableVBSRL = [new Responsable("Camila","Lobeno",40587945,"Brown 300, Bahia Blanca","Camilita5050@gmail.com",29954687956), 
                        new Responsable("Roberto","Richard",39546464,"Rivadavia 1500, Bs As","Robertin@gmail.com",2995478912)];



$arrayViajes1 = [new Viaje("Bariloche", "19:30", "02:30",1,7800,"07/08/2022",44,20,$objResponsableFBSRL[0]), 
                new Viaje("Chile","07:00","13:00",2,25000,"02/05/2022",100,8,$objResponsableFBSRL[1])];

$arrayViajes2 = [new Viaje("Bs As", "13:45", "02:40",3,15000,"10/05/2022",150,30,$objResponsableVBSRL[0]), 
                new Viaje("Brasil","15:00","07:00",4,150000,"20/05/2022",1500,100,$objResponsableVBSRL[1])];


$arrayObjEmpresa = [new Empresa("FBSRL","Flecha Bus",$arrayViajes1), 
                    new Empresa("VBSRL","Via Bariloche",$arrayViajes2)];

$objTerminal = new Terminal("La terminalita","Av. Argentina 2000",$arrayObjEmpresa);


/**************************************/
/*************** MODULOS **************/
/**************************************/

function separador(){
    echo "======================================================"."\n";
}

/**
 * Muestra el menu para que el usuario elija y retorna la opcion
 * @return int 
 */
function menu()
{
    echo "\n"."MENU DE OPCIONES"."\n";
    echo "1) Ver datos de las empresas de la terminal."."\n";
    echo "2) Venta automatica."."\n";
    echo "3) Cual empresa tuvo mayor recaudacion."."\n";
    echo "4) Agregar un viaje."."\n";
    echo "5) Buscar viajes con destino y disponibilidad."."\n";
    echo "6) Agregar pasajeros a un viaje."."\n";
    echo "7) Saber el responsable de un viaje"."\n";
    echo "0) Salir"."\n";
    echo "Opcion: ";
    $menu = trim(fgets(STDIN));
    echo "\n";
    return $menu;
}

/**************************************/
/************** FUNCIONES *************/
/**************************************/

separador();
echo $objTerminal;
separador();

//punto 4
$validacion = $objTerminal->ventaAutomatica(10,"07/08/2022","bariloche","flecha bus");
if($validacion != null){
    echo "la compra se ha confirmado! el viaje es: "."\n".$validacion."\n";
}else{
    echo "El viaje no se ha podido confirmar, intenta de nuevo con otros datos";
}
separador();

//punto 5
$mayorRecaudacion = $objTerminal->empresaMayorRecaudacion();
echo "La empresa con mayor recaudacion es: "."\n".$mayorRecaudacion."\n";
separador();

//punto 6
$responsable = $objTerminal->responsableViaje(3);
echo "El responsable del viaje 3 es: "."\n".$responsable."\n";
separador();

//Plus 
$nuevoViaje = new Viaje("Bariloche", "19:30", "02:30",1,7800,"07/08/2022",44,20,$objResponsableFBSRL[0]);
$empresas = $objTerminal->getArrayObjEmpresa();
$empresas[0]->incorporarViaje($nuevoViaje);
$objTerminal->setArrayObjEmpresa($empresas);
echo $objTerminal;
separador();

//plus 2
$validacion = $objTerminal->getArrayObjEmpresa()[1]->venderViajeADestino(10,"Bs As");
if($validacion != null){
    echo "Viaje confirmado! "."\n".$validacion."\n";
}else{
    echo "Viaje no se pudo realizar"."\n";
}
separador();

?>