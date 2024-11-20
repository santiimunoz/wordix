<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CASPA", "LOROS", "RATON", "PERRO", "ZORRO"
    
    ];

    return ($coleccionPalabras);
}

/* ****COMPLETAR***** */

function cargarPartidas(){
   $coleccionPartidas=[];

   $coleccionPartidas=[["palabraWordix"=>"QUESO", "jugador"=>"Majo","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"PERRO", "jugador"=>"Maria","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"YUYOS", "jugador"=>"Luis","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"HUEVO", "jugador"=>"Daniel","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"RATON", "jugador"=>"Santi","intentos"=>0, "puntaje"=>0], 
                       ["palabraWordix"=>"QUESO", "jugador"=>"Valen","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"Catu","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"Fabri","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"Lucas","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"Giane","intentos"=>0, "puntaje"=>0]
];

return $coleccionPartidas;
}

function seleccionarOpcion(){
    echo "1)Jugar al wordix con una palabra elegida \n2)jugar wordix con una palabra aleatoria
    \n3)mostrar una partida \n4)mostrar la primer partida ganadora \n5)mostrar resumen del jugador 
    \n6)mostrar listado de partidas ordenadas por jugador y por palabra 
    \n7)agregar una palabra de 5 letra a wordix \n8)salir";
    $opcion=trim(fgets(STDIN));
}

//punto 4
//$palabra= leerPalabra5Letras();

//punto 5

function cinco(){
    echo "ingrese un num min";
    $numMin=trim(fgets(STDIN));
    echo "ingrese un num max";
    $numMax=trim(fgets(STDIN));

    return solicitarNumeroEntre($numMin, $numMax);
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();


//Proceso:



//$partida = jugarWordix("MELON", strtolower("Majo"));
//print_r($partida);
/*imprimirResultado($partida);*/

echo seleccionarOpcion();


echo cinco();   

do {
    
    $opcion = 1;

    
    switch ($opcion) {
        case 1: 
            

            

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion == "salir");

