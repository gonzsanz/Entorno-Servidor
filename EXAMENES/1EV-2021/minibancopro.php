<?php

session_start();

// include_once "funciones.php";

if (!isset($_SESSION["saldo"])) {
    $_SESSION["saldo"] = 0;
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Orden"])) {
        switch ($_POST["Orden"]) {
            case "Ingreso":
                $msg = ingreso($_POST["importe"]);
                break;
            case "Reintegro":
                reintegro($_POST["importe"]);
                break;
            case "Ver saldo":
                $msg = mostrarSaldo();
                break;
            case "Terminar":
                session_destroy();
        }
    }
}
header("Location: minibanco.php?msg=" . urlencode($msg));

function ingreso($cantidad): string {
    $msg = "";
    if (!is_numeric($cantidad) || $cantidad < 0) {
        $msg = "Importe erróneo o importe menor de 0";
    } else {
        $_SESSION["saldo"] +=  $cantidad;
        $msg = " Operación realizada.";
    }
    return $msg;
}
function reintegro($cantidad): string {
    $msg = "";
    if (!is_numeric($cantidad) || $cantidad < 0 || $cantidad > $_SESSION['saldo']) {
        $msg = "Importe erróneo o importe superior al saldo.";
    } else {
        $_SESSION["saldo"] -=  $cantidad;
        $msg = " Operación realizada.";
    }
    return $msg;
}
function mostrarSaldo(): string {
    return "Su saldo actual es: " . $_SESSION["saldo"];
}
