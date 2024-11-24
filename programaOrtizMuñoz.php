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
function cargarColeccionPalabras(){
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "RATON", "LOROS", "RATON", "PERRO", "ZORRO"
    ];

    return $coleccionPalabras;
}

/* ****COMPLETAR***** */

function cargarPartidas(){
   $coleccionPartidas=[];

   $coleccionPartidas=[["palabraWordix"=>"QUESO", "jugador"=>"santi","intentos"=>3, "puntaje"=>3],
                       ["palabraWordix"=>"PERRO", "jugador"=>"santi","intentos"=>6, "puntaje"=>3],
                       ["palabraWordix"=>"YUYOS", "jugador"=>"santi","intentos"=>3, "puntaje"=>3],
                       ["palabraWordix"=>"HUEVO", "jugador"=>"santi","intentos"=>0, "puntaje"=>3],
                       ["palabraWordix"=>"RATON", "jugador"=>"santi","intentos"=>0, "puntaje"=>3], 
                       ["palabraWordix"=>"QUESO", "jugador"=>"valen","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"catuu","intentos"=>6, "puntaje"=>1],
                       ["palabraWordix"=>"QUESO", "jugador"=>"fabri","intentos"=>0, "puntaje"=>0],
                       ["palabraWordix"=>"ZORRO", "jugador"=>"santi","intentos"=>6, "puntaje"=>0],
                       ["palabraWordix"=>"QUESO", "jugador"=>"giane","intentos"=>0, "puntaje"=>0]
];

return $coleccionPartidas;
}

function seleccionarOpcion(){
    echo "1)Jugar al wordix con una palabra elegida 
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

//punto 4
/*$palabra= leerPalabra5Letras();*/

//punto 5

function cinco(){
    echo "ingrese un num min";
    $numMin=trim(fgets(STDIN));
    echo "ingrese un num max";
    $numMax=trim(fgets(STDIN));

    return solicitarNumeroEntre($numMin, $numMax);
}

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

function cmp($a,$b){
    if($a==$b){
        $orden=0;
    }else if($a<$b){
        $orden=-1;
    }else{
        $orden=1;
    }
    return $orden;
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
/*$coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();


//Proceso:



//$partida = jugarWordix("MELON", strtolower("Majo"));
//print_r($partida);
/*imprimirResultado($partida);*/


$opcion=seleccionarOpcion();


do { 
    
    
    switch ($opcion) {
        case 1: 
            $coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

$jugador=solicitarJugador();

$parar=true;


$i=0;


echo "ingrese un numero de palabra";
$numPalabra=trim(fgets(STDIN));

while($numPalabra>$cantPalabras || $numPalabra<0 ){


    echo "debe elegir un numero de palabra disponible";
    $numPalabra=trim(fgets(STDIN));
}

while($i<$cantPartidas && $parar){
    if($jugador==$coleccionPartidas[$i]["jugador"] && 
    $coleccionPalabras[$numPalabra]==$coleccionPartidas[$i]["palabraWordix"]){
       echo "debe ingresar otro numero de palabra que no este elegida ";
       $newPalabra=trim(fgets(STDIN));
       while($newPalabra>$cantPalabras || $newPalabra<0){
        echo "debe elegir un numero de palabra disponible";
        $newPalabra=trim(fgets(STDIN));
         
    }
       if($newPalabra!=$numPalabra){ 
        $parar=false;
        $numPalabra=$newPalabra;
     }
    }
    

$i=$i+1;
}

$palabra=$coleccionPalabras[$numPalabra];






$partida = jugarWordix($palabra, strtolower($jugador));
print_r($partida); 

$coleccionPartidas[$cantPartidas]=$partida;
            
            break;
        case 2: 
 $coleccionPalabras=cargarColeccionPalabras();
 $coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

$jugador=solicitarJugador();

$nums=rand(0,$cantPalabras);
echo $nums;

       $palabra=$coleccionPalabras[$nums];
 echo $palabra;

$j=0;
$parar=true;

while($j<$cantPartidas && $parar){
    if($jugador==$coleccionPartidas[$j]["jugador"] && 
    $coleccionPalabras[$nums]==$coleccionPartidas[$j]["palabraWordix"]){
       $numPalabra=rand(0,$cantPalabras);
         
       if($numPalabra!=$nums){ 
        $parar=false;
        $palabra=$coleccionPalabras[$numPalabra];
     }
     }
     $j=$j+1;
    }
echo $numPalabra;
echo $palabra;
$partida = jugarWordix($palabra, strtolower($jugador));
print_r($partida); 

$coleccionPartidas=[$coleccionPartidas,$partida];

print_r($coleccionPartidas);
            break;
        case 3: 
            $coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

echo "ingrese un numero de  partida";
$numPartida=trim(fgets(STDIN));

while($numPartida>$cantPartidas || $numPartida<0){

    echo "ERROR \ndebe ingresar un numero de partida disponible";
    $numPartida=trim(fgets(STDIN));
}
   
if($coleccionPartidas[$numPartida]["intentos"]==6 && $coleccionPartidas[$numPartida]["puntaje"]==0){
    $puntaje="no adivino la palabra";
}else{
    $puntaje="adivino la palabra en: " . $coleccionPartidas[$numPartida]["intentos"] . " intentos.";
}


   echo "Partida WORDIX nùmero: " . $numPartida . "\npalabra: " . $coleccionPartidas[$numPartida]["palabraWordix"] . "\njugador: " .
    $coleccionPartidas[$numPartida]["jugador"] 
     . "\npuntaje: " . $coleccionPartidas[$numPartida]["puntaje"] . " puntos" . "\nintento: " . $puntaje;

            break;
      case 4:

        $coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);


echo "ingrese el nombre del jugador";
$jugador=trim(fgets(STDIN));

$i=0;
$parar=true;

while($i<$cantPartidas && $parar){

    if($coleccionPartidas[$i]["jugador"]==$jugador && $coleccionPartidas[$i]["puntaje"]!=0){
       $partidaGanada= "partida WORDIX " . $i . ":" . " palabra " . $coleccionPartidas[$i]["palabraWordix"] .
       "\njugador:" . $coleccionPartidas[$i]["jugador"] . "\npuntaje: " . $coleccionPartidas[$i]["puntaje"] . 
       "\nintento: adivino la palabra en " . $coleccionPartidas[$i]["intentos"] . " intentos.";
     $parar=false;
    }else{
        $partidaGanada= "el jugador " . $jugador . " no gano ninguna partida";
    }
$i=$i+1;
}

echo $partidaGanada;



        break;
        case 5:

            $coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

echo "ingrese un nombre de jugador";
$jugador=trim(fgets(STDIN));

$totalPartidas=0;
$totalPuntaje=0;
$totalVictorias=0;
$intento1=0;
$intento2=0;
$intento3=0;
$intento4=0;
$intento5=0;
$intento6=0;

for($i=0;$i<$cantPartidas;$i++){
    if($jugador==$coleccionPartidas[$i]["jugador"]){
        $totalPartidas=$totalPartidas+ 1;
        $totalPuntaje=$totalPuntaje+ $coleccionPartidas[$i]["puntaje"];
        if($coleccionPartidas[$i]["puntaje"]!=0){
            $totalVictorias= $totalVictorias+ 1;
        }
        if($coleccionPartidas[$i]["intentos"]==1){
            $intento1=$intento1+1;
        }else if($coleccionPartidas[$i]["intentos"]==2){
            $intento2=$intento2+1;
        }else if($coleccionPartidas[$i]["intentos"]==3){
            $intento3=$intento3+1;
        }else if($coleccionPartidas[$i]["intentos"]==4){
            $intento4=$intento4+1;
        }else if($coleccionPartidas[$i]["intentos"]==5){
            $intento5=$intento5+1;
        }else if($coleccionPartidas[$i]["intentos"]){
            $intento6=$intento6+1;
        }

    }
}
if($totalVictorias==0){
    $porcentajeVictorias=0;
}else{
    $porcentajeVictorias=($totalVictorias/$totalPartidas)*100;
}
 
echo "jugador: " . $jugador . "\npartidas: " . $totalPartidas . "\npuntaje total: " . $totalPuntaje 
. "\nvictorias: " . $totalVictorias . "\nporcentaje victorias: " . $porcentajeVictorias . "%" .
 "\nadivinadas: " . "\n   intento 1: " . $intento1 . "\n   intento 2: " . $intento2 . "\n   intento 3: " . 
 $intento3 . "\n   intento 4: " . $intento4 . "\n   intento 5: " . $intento5 . "\n   intento 6: " . $intento6;


            break;
            case 6:

            $coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

uasort($coleccionPartidas, 'cmp');

print_r($coleccionPartidas);


                break;
                case 7:

                $coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();

$cantPartidas=count($coleccionPartidas);
$cantPalabras=count($coleccionPalabras);

echo"ingrese su nombre";
$jugador=trim(fgets(STDIN));

$palabra=leerPalabra5letras();

    $coleccionPalabras[$cantPalabras]=$palabra;


print_r($coleccionPalabras);

$partida = jugarWordix($palabra, strtolower($jugador));
print_r($partida); 

                    break;
                   
    }
    $opcion=seleccionarOpcion();
} while ($opcion != 8);

if($opcion=8){
    echo "usted a salido del menu opcional!";
}