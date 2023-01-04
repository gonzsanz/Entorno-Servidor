<?php

/*
 *  Funciones para limpiar la entrada de posibles inyecciones
 */

function limpiarEntrada(string $entrada): string {
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada) {

    foreach ($entrada as $key => $value) {
        $entrada[$key] = limpiarEntrada($value);
    }
}

// Funcion para mostrar la bandera del pais
function mostrarBandera($ip) {

    $pais = file_get_contents('http://ip-api.com/json/' . $ip . '?fields=countryCode');
    $pais = substr($pais, 16, 2);
    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    if ($ipdat->geoplugin_countryCode == null) {
        echo "<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Pirate_Flag.svg/2560px-Pirate_Flag.svg.png' width='20' alt='No hay bandera'>";
    } else {
        $codigo = $ipdat->geoplugin_countryCode;
        echo "<img src='https://flagcdn.com/" . strtolower($codigo) . ".svg' width='10' alt='Bandera del pais'>";
    }
}

// Funcion para mostrar la imagen del cliente
function mostrarImagen($id) {
    $fichero = str_pad(0, 7, "0", STR_PAD_LEFT);
    $fichero = substr($fichero, 0, 8 - strlen($id)) . $id;
    $fichero = "app/uploads/" . $fichero . ".jpg";

    if (file_exists($fichero)) {
        return "<img src='$fichero' width='20' alt='Imagen del cliente'>";
    }
    return "<img src='https://robohash.org/$id' width='20' alt='Foto perfil robot'>";
}

// Funcion para comprobar los datos
function comprobarDatos($cli, $email, $ip, $telefono) {
    $db = AccesoDatos::getModelo();
    $access = true;
    $msg = "<script>alert('Los siguientes campos no son validos: ";
    if ($db->checkMail($cli->email) && $cli->email != $email) {
        $msg .= " Email";
        $access = false;
    } else if (!validarTelefono($telefono)) {
        $msg .= " Teléfono";
        $access = false;
    } else if (!validarIp($ip)) {
        $msg .= " Ip";
        $access = false;
    } else if (!filter_var($cli->email, FILTER_VALIDATE_EMAIL)) {
        $msg .= " Email";
        $access = false;
    }
    $msg .= "');</script>";
    if (!$access) echo $msg;
    return $access;
}

function validarTelefono($telefono) {

    return preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3,4}$/', $telefono);
}

function validarIp($ip) {

    return filter_var($ip, FILTER_VALIDATE_IP);
}
