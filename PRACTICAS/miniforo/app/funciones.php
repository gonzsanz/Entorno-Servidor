<?php

// Checkear que el usuario y la contraseña son correctos
function usuarioOk($usuario, $contraseña): bool {

   if (strlen($usuario) >= 8 && strrev($contraseña) === $usuario) {

      return true;
   }
   return false;
}

// Controlar la inyeccion de codigo
function comprobarInyeccion($cadena) {

   return trim(htmlspecialchars($cadena, ENT_QUOTES, "UTF-8"));
}


// Devolver el numero de palablas que hay en el mensaje
function contarPalabras($cadena): int {

   return str_word_count($cadena);
}

// Devuelve la letra mas repetida
function contarLetra($cadena): string {

   $letras = 'abcdefghijklmnñopqrstuvwxyz';
   $cont = 0;
   $max = 0;
   $repetida = '';

   for ($i = 0; $i < strlen($letras); $i++) {

      $letra =  $letras[$i];

      $cont = substr_count(strtolower($cadena), $letra);

      if ($cont > $max) {
         $max = $cont;
         $repetida = $letra;
      }
   }
   return $repetida;
}

// Encontrar la palbra más repetida
function palabraRepetida($cadena): string {

   $arrayCadena = explode(" ", $cadena);
   $repes = array_count_values($arrayCadena);
   $max = 0;

   foreach ($repes as $key => $value) {

      if ($value > $max) {
         $max = $value;
         $repetida = $key;
      }
   }
   return $repetida;
}
