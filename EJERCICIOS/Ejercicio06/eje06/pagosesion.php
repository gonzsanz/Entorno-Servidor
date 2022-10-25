<?php
session_start();

if (isset($_SESSION["nuevatarjeta"])) {
    $tarjeta = $_SESSION["nuevatarjeta"];
}

if (isset($_GET["nuevatarjeta"])) {
    $_SESSION["nuevatarjeta"] = $_GET["nuevatarjeta"];
    echo "<center><br><h1> Cambiando su tipo de tarjeta...</h1> ";
    echo "<img src='img/loading.gif' /></center>";
    header("refresh:.5;url=pagosesion.php");
    exit();
}


if (!isset($tarjeta)) {
    echo "<center>
        <H2>NO TIENE FORMA DE PAGO ASIGNADA</H2>
        </center>";
} else {
    echo "<center>
            <H2> SU FORMA DE PAGO ACTUAL ES</H2> 
            <img src='img/" . $tarjeta . ".gif' />  
        </center>";
}

session_destroy();
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forma de pago</title>
</head>

<body>
    <center>
        <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
        <a href='pagosesion.php?nuevatarjeta=cashu'><img src='img/cashu.gif' /></a>&ensp;
        <a href='pagosesion.php?nuevatarjeta=cirrus1'><img src='img/cirrus1.gif' /></a>&ensp;
        <a href='pagosesion.php?nuevatarjeta=dinersclub'><img src='img/dinersclub.gif' /></a>&ensp;
        <a href='pagosesion.php?nuevatarjeta=mastercard1'><img src='img/mastercard1.gif' /></a>&ensp;
        <a href='pagosesion.php?nuevatarjeta=paypal'><img src='img/paypal.gif' /></a>&ensp;
        <a href='pagosesion.php?nuevatarjeta=visa1'><img src='img/visa1.gif' /></a>&ensp;
        <a href='pagosesion.php?nuevatarjeta=visa_electron'><img src='img/visa_electron.gif' /></a>
    </center>
</body>