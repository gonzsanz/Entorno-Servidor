<?php

$nombres = ["Juan", "Pedro", "María", "Elena", "Luis"];
$notas = [7.5, 6.0, 7.8, 9.5, 3.5];
// Une los array en uno nuevo
$calificaciones = unir($nombres, $notas);
// Creo un nuevo array
$datos = separar($calificaciones);
echo "<code>
    <pre>";
print_r($calificaciones);
print_r($datos);
echo "</pre>
</code>";


function unir($nombres, $notas) {

    $calificaciones = [];
    for ($i = 0; $i < count($nombres); $i++) {
        $calificaciones[$nombres[$i]] = $notas[$i];
    }
    return $calificaciones;


}

function separar($calificaciones) {

    $arr = [];
    $nombres = [];
    $notas = [];
    foreach ($calificaciones as $nombre => $nota) {
        $nombres[] = $nombre;
        $notas[] = $nota;
    }
    $arr[0] = $nombres;
    $arr[1] = $notas;
    return $arr;
}
