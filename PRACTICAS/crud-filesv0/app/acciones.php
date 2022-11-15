<?php



function accionDetalles($id) {
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario = $usuario[3];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

function accionAlta() {
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden = "Nuevo";
    include_once "layout/formulario.php";
    exit();
}

function accionPostAlta() {

    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $nuevo = [$_POST['nombre'], $_POST['login'], $_POST['clave'], $_POST['comentario']];
    $_SESSION['tuser'][] = $nuevo;
    $_SESSION['msg'] = " Se añadido el usuario:" . $_POST['nombre'];
}

function accionTerminar() {
    volcarDatos($_SESSION['tuser']);
    session_destroy();
    $_SESSION['msg'] = " Se han grabado los datos.";
}

function accionBorrar($id) {
    unset($_SESSION["tuser"][$id]);
    $_SESSION["tuser"] = array_values($_SESSION["tuser"]);
    $_SESSION['msg'] = " Se ha borrado el usuario.";
}

function accionModificar($id) {
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario = $usuario[3];
    $orden = "Modificar";
    include_once "layout/formulario.php";
    exit();
}

function accionPostModificar() {
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $nuevo = [$_POST['nombre'], $_POST['login'], $_POST['clave'], $_POST['comentario']];
    $_SESSION['tuser'][$_GET["id"]] = $nuevo;
    $_SESSION['msg'] = " Se ha modificado el usuario.";
}
