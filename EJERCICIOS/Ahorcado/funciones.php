<?php

function elegirPalabra()
{
    static $tpalabras = ["Madrid", "Sevilla", "Murcia", "Málaga", "Mallorca", "Menorca"];
    // COMPLETAR
    return $tpalabras[array_rand($tpalabras)];
}

function comprobarLetra($letra, $cadena)
{
    // COMPLETAR
    if (strpos($cadena, $letra) !== false) {
        return true;
    }
    return false; // Devuelve true o false si la letra esta en la cadena  
}


/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición    si cada letra se encuentra en la cadenaletras
 *
 * Ej  generaPalabraconHuecos("aeiou"     ,"hola pepe") -->"-o-a--e-e"
 *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
 *
 */

function generaPalabraconHuecos($cadenaletras, $cadenapalabra)
{

    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    for ($i = 0; $i < strlen($resu); $i++) {
        $resu[$i] = '-';
    }
    // COMPLETAR rellenado la cadena resu

    for ($i = 0; $i < strlen($cadenapalabra); $i++) {

        if (strpos($cadenaletras, $cadenapalabra[$i]) !== false) {
            $resu[$i] = $cadenapalabra[$i];
        }
    }

    return $resu;
}
