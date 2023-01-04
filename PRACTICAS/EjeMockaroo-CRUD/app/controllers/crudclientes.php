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

    if (comprobarDatos($cli, $cli->email, $cli->ip_address, $cli->telefono)) {
        $db->addCliente($cli);
    } else {
        $orden = "Nuevo";
        include_once "app/views/formulario.php";
    }
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

    if (comprobarDatos($cli, $cli->email, $cli->ip_address, $cli->telefono)) {
        $db->modCliente($cli);
    } else {
        $orden = "Modificar";
        include_once "app/views/modificar.php";
    }
}
