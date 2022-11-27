<?php

// Evitar entrada de código
function limpiarEntrada(string $entrada): string {
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = stripslashes($salida); // Elimina backslashes \
    $salida = htmlspecialchars($salida); // Traduce caracteres especiales en entidades HTML
    return $salida;
}

// Evitar entrada masiva de incidencias
$numincidencias = 0;

if (isset($_COOKIE["numincidencias"])) {
    $numincidencias = $_COOKIE["numincidencias"];
    if ($numincidencias > 3) {
        echo "Superado el máximo de incidencias.";
        echo "<br>Espere 2 minutos para introducir otra o reinicie su navegador";
        exit();
    }
}
$numincidencias++;
setcookie("numincidencias", $numincidencias, time() + 2 * 60);

// Guardar incidencia
$nombre = limpiarEntrada($_POST["nombre"]);
$resumen = limpiarEntrada($_POST["resumen"]);
$prioridad = limpiarEntrada($_POST["prioridad"]);

$fecha = date("d:m:Y G:i");
$ip = $_SERVER["REMOTE_ADDR"];

$linea = $fecha . "," . $nombre . "," . $resumen . "," . $prioridad . "," . $ip . "\n";
$file = @file_put_contents("incidencias.txt", $linea, FILE_APPEND);

if ($file) {
    echo "Muchas gracias $nombre, se ha anotado la incidencia";
} else {
    echo "Error, no se ha podido anotar su incidencia";
}
