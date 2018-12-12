<?php

    //abrimos el documento
    $file = fopen('../results.csv','r');    

    $match = 0;
    $noMatch = 0;    
    //mientras sea distinto a bacio    
    while(!feof($file)){
        //obtenemos los datos del file
        $line = fgets($file);
        if (preg_match(
                   '/^2018\-01\-(\d\d),.*$/',
                   $line,
                   $m 
            )){
                print_r($m);
                $match++;
            } else {
                $noMatch++;
            }
            
        }
        echo 'Total de match: '.$match.' Total no match: '.$noMatch;

//cerramos el documento
    fclose($file);