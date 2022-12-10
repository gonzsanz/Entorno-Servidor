<?php
include_once "app/funciones.php";

function accionAlta() {
    $user = new Cliente();
    $user->id = "";
    $user->first_name  = "";
    $user->last_name   = "";
    $user->email = "";
    $user->gender   = "";
    $user->ip_address = $_SERVER["REMOTE_ADDR"];
    $user->telefono = "";
    $orden = "Nuevo";
    include_once "plantillas/formulario.php";
}
function accionDetalles($login) {
    $db = AccesoDatos::getModelo();
    $user = $db->getUsuario($login);
    $orden = "Detalles";
    include_once "plantillas/formulario.php";
}


function accionModificar($login) {
    $db = AccesoDatos::getModelo();
    $user = $db->getUsuario($login);
    $orden = "Modificar";
    include_once "plantillas/formulario.php";
}

function accionBorrar($login) {
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarUsuario($login);
}

function accionPostAlta() {
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $user = new Cliente();
    $user->id = $_POST["id"];
    $user->first_name  = $_POST["nombre"];
    $user->last_name   = $_POST["apellido"];
    $user->email = $_POST["email"];
    $user->gender   = $_POST["genero"];
    $user->ip_address = $_SERVER["REMOTE_ADDR"];
    $user->telefono = $_POST["telefono"];
    $db = AccesoDatos::getModelo();
    $db->addUsuario($user);
}
function accionPostModificar() {
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $user = new Cliente();
    $user->id = $_POST["id"];
    $user->first_name  = $_POST["nombre"];
    $user->last_name   = $_POST["apellido"];
    $user->email = $_POST["email"];
    $user->gender   = $_POST["genero"];
    $user->ip_address = $_SERVER["REMOTE_ADDR"];
    $user->telefono = $_POST["telefono"];
    $db = AccesoDatos::getModelo();
    $db->modUsuario($user);
}
