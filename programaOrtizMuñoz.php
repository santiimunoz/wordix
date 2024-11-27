<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Muñoz, Santiago. FAI-5558. TECNICATURA EN DESARROLLO WEB. ssantii.m13@gmail.com . santiimunoz */
/* Ortiz, Lucas. FAI-5561 . TECNICATURA EN DESARROLLO WEB. lucaseortiz45@gmail.com . luquitas45*/


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/ 

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras(){
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "RATON", "LOROS", "LISTO", "PERRO", "ZORRO"
                         ];

    return $coleccionPalabras;
}


/**
 * Compila la coleccion de partidas
 * arreglo indexado de arreglos asociativos
 * @return array
*/
function cargarPartidas(){
   $coleccionPartidas=[];
   $coleccionPartidas=[["palabraWordix"=>"MUJER", "jugador"=>"santi","intentos"=>1, "puntaje"=>15],
                       ["palabraWordix"=>"PERRO", "jugador"=>"lucas","intentos"=>6, "puntaje"=>12],
                       ["palabraWordix"=>"YUYOS", "jugador"=>"valen","intentos"=>3, "puntaje"=>15],
                       ["palabraWordix"=>"HUEVO", "jugador"=>"fabri","intentos"=>6, "puntaje"=>0],
                       ["palabraWordix"=>"RATON", "jugador"=>"santi","intentos"=>1, "puntaje"=>17], 
                       ["palabraWordix"=>"QUESO", "jugador"=>"valen","intentos"=>5, "puntaje"=>11],
                       ["palabraWordix"=>"MELON", "jugador"=>"catuu","intentos"=>6, "puntaje"=>9],
                       ["palabraWordix"=>"QUESO", "jugador"=>"fabri","intentos"=>6, "puntaje"=>0],
                       ["palabraWordix"=>"ZORRO", "jugador"=>"santi","intentos"=>6, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"giane","intentos"=>1, "puntaje"=>15]
                      ];

return $coleccionPartidas;
}


/**
 * Es el menu de opciones, donde el jugador podra elegir una opcion
 * @return string
 */
function seleccionarOpcion(){
    echo "\n\n1)Jugar al wordix con una palabra elegida 
    \n2)jugar wordix con una palabra aleatoria
    \n3)mostrar una partida 
    \n4)mostrar la primer partida ganadora
    \n5)mostrar resumen del jugador 
    \n6)mostrar listado de partidas ordenadas por jugador y por palabra 
    \n7)agregar una palabra de 5 letra a wordix
    \n8)salir";
    $option=trim(fgets(STDIN));

    return $option;
}

/**
 * Esta funcion devuelve la primera partida ganada, si no, devuelve -1
 * @param array $arreglo
 * @param int $j
 * float $i
 * @return string
 */
function primerPartida($arreglo, $j){
    $i = 0;
    $parar = true;
    $cantPartidas = count($arreglo);
    while($i < $cantPartidas && $parar){
        if($arreglo[$i]["jugador"] == $j && $arreglo[$i]["puntaje"] != 0){
            $partidaGanada = "partida WORDIX " . $i . ":" . " palabra " . $arreglo[$i]["palabraWordix"] .
            "\njugador:" . $arreglo[$i]["jugador"] . "\npuntaje: " . $arreglo[$i]["puntaje"] . 
            "\nintento: adivino la palabra en " . $arreglo[$i]["intentos"] . " intentos.";
            $parar = false;
        }
        else{
            $partidaGanada= "El jugador " . $j . " no gano ninguna partida";
        }
    $i = $i + 1;
    }

    return $partidaGanada;
}


/**
 * Esta fincion muestra los datos del jugador
 * @param array $arreglo
 * @param int $j
 * float $totalPartidas, $totalPuntaje, $totalVictorias, $intento1, $intento2, $intento3, $intento4,
 * $intento5, $intento6, $cantPartidas, $porcentajeVictorias
 */
function mostrarDatos($arreglo, $j){
    $totalPartidas = 0;
    $totalPuntaje = 0;
    $totalVictorias = 0;
    $intento1 = 0;
    $intento2 = 0;
    $intento3 = 0;
    $intento4 = 0;
    $intento5 = 0;
    $intento6 = 0;
    $cantPartidas = count($arreglo);

    for($i = 0; $i < $cantPartidas; $i++){
        if($j == $arreglo[$i]["jugador"]){
            $totalPartidas = $totalPartidas + 1;
            $totalPuntaje = $totalPuntaje + $arreglo[$i]["puntaje"];
            if($arreglo[$i]["puntaje"] != 0){
                $totalVictorias = $totalVictorias+ 1;
            }
            if($arreglo[$i]["intentos"] == 1){
                $intento1 = $intento1 + 1;
            }
            else if($arreglo[$i]["intentos"] == 2){
                $intento2 = $intento2 + 1;
            }
            else if($arreglo[$i]["intentos"] == 3){
                $intento3 = $intento3 + 1;
            }
            else if($arreglo[$i]["intentos"] == 4){
                $intento4 = $intento4 + 1;
            }
            else if($arreglo[$i]["intentos"] == 5){
                $intento5 = $intento5 + 1;
            }
            else if($arreglo[$i]["intentos"]){
                $intento6 = $intento6 + 1;
            }
        }
    }

    if($totalVictorias == 0){
        $porcentajeVictorias = 0;
    }
    else{
        $porcentajeVictorias = ($totalVictorias/$totalPartidas) * 100;
    }

    echo "jugador: " . $j . "\npartidas: " . $totalPartidas . "\npuntaje total: " . $totalPuntaje 
    . "\nvictorias: " . $totalVictorias . "\nporcentaje victorias: " . $porcentajeVictorias . "%" .
    "\nadivinadas: " . "\n   intento 1: " . $intento1 . "\n   intento 2: " . $intento2 . "\n   intento 3: " . 
    $intento3 . "\n   intento 4: " . $intento4 . "\n   intento 5: " . $intento5 . "\n   intento 6: " . $intento6;
}


/**
 * Solicita el nombre del jugador, y se encarga de que el nombre sea alfabetico (contenga letras)
 * @return string
 */
function solicitarJugador(){
    echo "ingrese el nombre del jugador";
    $user=trim(fgets(STDIN));
    $user=strtolower($user);
    while(!(esPalabra($user))){
        echo "debe ingresar un nombre alfabetico";
        $user= strtolower(trim(fgets(STDIN)));
   }

     return $user;
}


/**
 * Esta funcion ordena alfabeticamente el listado de partidas
 * @param array $a, $b
 * @return int
 */
function ordenamiento($a,$b){
    $orden = 1;
    if($a["jugador"] == $b["jugador"]){
        if ($a["palabraWordix"] < $b["palabraWordix"]){
            $orden = -1;
        }
    }
    else if($a["jugador"] < $b["jugador"]){
        $orden = -1;
    }
    

    return $orden;
}


/**
 * Imprime en pantalla el resultado de la partida jugada
 * @param array $partidaJugada
 * 
 */
function imprimirResultado($partidaJugada){
    print_r($partidaJugada);

}


/**
 * Esta funcion agrega palabras al listado
 * @param array $arreglo
 * @param string $palabr
 * @return array
 */
function agregarPalabra($arreglo,$palabr){
    $arreglo[]=$palabr;

    return $arreglo;
}


/**
 * Imprime en pantalla la derrota del jugador, si es que perdio, si no, imprime en cuantos intentos gano. Independientemente, 
 * imprimira los datos de la partida
 * @param array $arreglo
 * @param int $numero
 * string $puntaje
 */
function datosPartida($arreglo,$numero): void{     
    if($arreglo[$numero]["intentos"]==6 && $arreglo[$numero]["puntaje"]==0){
        $puntaje="no adivino la palabra";
    }
    else{
        $puntaje="adivino la palabra en: " . $arreglo[$numero]["intentos"] . " intentos.";
    }

    echo "Partida WORDIX nùmero: " . $numero . "\npalabra: " . $arreglo[$numero]["palabraWordix"] . "\njugador: " .
    $arreglo[$numero]["jugador"] 
     . "\npuntaje: " . $arreglo[$numero]["puntaje"] . " puntos" . "\nintento: " . $puntaje;
 }




/**ALGORITMO PRINCIPAL
*Programa que permite al usuario jugar wordix con diferentes opciones para elegir
*boolean $parar
*int $cantPartidas, $cantPalabras, $opcion
*float $j, $i, $numPalabra, $newPalabra, 
*string $jugador
*float[] $coleccionPalabras, $coleccionPartidas, $partida, 
*/


$coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

$cantPalabras = $cantPalabras-1;
$j = 0;
$parar = true;
$i = 0;

$opcion=seleccionarOpcion();

do { 
    
 switch ($opcion) {
     case 1: 


            $jugador = solicitarJugador();

            echo "ingrese el numero de palabra con el que desea jugar";
            $numPalabra = solicitarNumeroEntre(0, $cantPalabras);

            

            while($i < $cantPartidas && $parar){
                if($jugador == $coleccionPartidas[$i]["jugador"] && 
                    $coleccionPalabras[$numPalabra] == $coleccionPartidas[$i]["palabraWordix"]){
                    echo "debe ingresar otro numero de palabra que no este elegida ";
                    $newPalabra = solicitarNumeroEntre(0, $cantPalabras);

                    if($newPalabra != $numPalabra){ 
                    $parar = false;
                    $numPalabra = $newPalabra;
                    }
               }
               $i = $i+1;
            }

            $palabra = $coleccionPalabras[$numPalabra];

            $partida = jugarWordix($palabra, strtolower($jugador));

            $coleccionPartidas[] = $partida;

            imprimirResultado($partida);
            
        break;

    case 2: 

        $jugador = solicitarJugador();

        $numPalabra = rand(0,$cantPalabras);


       $palabra = $coleccionPalabras[$numPalabra];

        while($j < $cantPartidas && $parar){
            if($jugador == $coleccionPartidas[$j]["jugador"] && 
            $coleccionPalabras[$numPalabra] == $coleccionPartidas[$j]["palabraWordix"]){
                $newPalabra = rand(0,$cantPalabras);
         
                if($newPalabra != $numPalabra){ 
                    $parar = false;
                    $palabra = $coleccionPalabras[$newPalabra];
                }
            }
        $j = $j + 1;
        }

        $partida = jugarWordix($palabra, strtolower($jugador));

        $coleccionPartidas[] = $partida;

        imprimirResultado($partida);

        break;

    case 3: 

        echo "ingrese un numero de  partida";
        $numPartida = solicitarNumeroEntre(0, $cantPartidas);

        datosPartida($coleccionPartidas,$numPartida);

        break;

    case 4:
     
        $jugador = solicitarJugador();

        if (primerPartida($coleccionPartidas, $jugador) != -1){
            echo primerPartida($coleccionPartidas, $jugador);
        }
        else {
            echo "No hay partidas ganadas en ese jugador";
        }

        break;

    case 5:

        $jugador = solicitarJugador();

        echo mostrarDatos($coleccionPartidas, $jugador);

        break;

    case 6:

        uasort($coleccionPartidas, 'ordenamiento');

        print_r($coleccionPartidas);

        break;

    case 7:
        
        $palabra = leerPalabra5letras();

        $coleccionPalabras = agregarPalabra($coleccionPalabras,$palabra);

        print_r($coleccionPalabras);

        break;
                   
    }

$opcion = seleccionarOpcion(); 
}

while ($opcion != 8);

if($opcion = 8){
    echo "usted a salido del menu opcional!";
}