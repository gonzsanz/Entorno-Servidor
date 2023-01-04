<?php

function crudBorrar($id) {
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarCliente($id);
}

function crudTerminar() {
    AccesoDatos::closeModelo();
    session_destroy();
}

function crudAlta() {
    $cli = new Cliente();
    $orden = "Nuevo";
    include_once "app/views/formulario.php";
}

function crudDetalles($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesSiguiente($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    if ($cli) {
        include_once "app/views/detalles.php";
    } else {
        crudDetalles($id);
    }
}

function crudDetallesAnterior($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    if ($cli) {
        include_once "app/views/detalles.php";
    } else {
        crudDetalles($id);
    }
}

function crudDetallesImprimir($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/imprimir.php";
}

function crudModificar($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden = "Modificar";
    include_once "app/views/modificar.php";
}

function crudModificarSiguiente($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    if ($cli) {
        include_once "app/views/modificar.php";
    } else {
        crudModificar($id);
    }
}
function crudModificarAnterior($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    if ($cli) {
        include_once "app/views/modificar.php";
    } else {
        crudModificar($id);
    }
}

function crudPostAlta() {
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();
    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->addCliente($cli);
}

function crudPostModificar() {
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->modCliente($cli);
}
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

function mostrarImagen($id) {
    $fichero = str_pad(0, 7, "0", STR_PAD_LEFT);
    $fichero = substr($fichero, 0, 8 - strlen($id)) . $id;
    $fichero = "app/uploads/" . $fichero . ".jpg";

    if (file_exists($fichero)) {
        return "<img src='$fichero' width='20' alt='Imagen del cliente'>";
    }
    return "<img src='https://robohash.org/$id' width='20' alt='Foto perfil robot'>";
}
