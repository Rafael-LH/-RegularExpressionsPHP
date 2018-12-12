<?php

    //abrimos el documento
    $file = fopen('../results.csv','r');    

    $match = 0;
    $noMatch = 0;    
    $t = time();
    //mientras sea distinto a vacio    
    while(!feof($file)){
        //obtenemos los datos del file
        $line = fgets($file);
        if (preg_match(
            //[0] => 2018-01-31,Mexico,Bosnia-Herzegovina,1,0,Friendly,San Antonio,USA,TRUE
                   '/^(\d{4}\-\d\d\-\d\d),(.+),(.+),(\d+),(\d+),.*$/i', //patron de busqueda el cual tiene 5 matches
                   $line, //cadena de entrada
                   $m //matches
            )){
                 if($m[4] === $m[5]){ //si match4 es igual al marcador de match 5
                     echo "Empate:  ";
                     //print_r($m);
                 }else if($m[4] > $m[5]){ //si match4 es mayor al marcador de match 5
                        echo "Local:  ";
                 } else{ //si match4 es menor al marcador de match 5
                        echo "Visitante: ";
                 }
                    $match++;
                    printf("\t%s VS %s [%d-%d]\n",$m[2],$m[3],$m[4],$m[5]);

            } else {
                $noMatch++;
            }
            
        }
        echo 'Total de match: '.$match.' Total no match: '.$noMatch;
        $tFinal = time() - $t; 
        echo "\nTiempo: ".$tFinal;

//cerramos el documento
    fclose($file);