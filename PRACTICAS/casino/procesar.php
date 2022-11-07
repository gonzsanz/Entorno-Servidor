<?php

session_start();
include "funciones.php";

if (!isset($_SESSION["dinero"])) {
    $_SESSION["dinero"] = $_GET["dinero"];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["dinero"])) {

    header("Location: jugar.php");
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["cantidad"] = $_POST["apostado"];

    if (isset($_POST["boton"])) {
        if ($_POST["boton"] == "Apostar") {
            $_SESSION["apuesta"] = $_REQUEST["apuesta"];
            apuesta($_SESSION["cantidad"]);
            header("Location: apuesta.php");
        }
    }
    if (isset($_POST["boton"])) {
        if ($_POST["boton"] == "Abandonar") {
            header("Location: despedida.php");
        }
    }
}
