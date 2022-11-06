<?php

if (isset($_COOKIE["nuevatarjeta"])) {
    $tarjeta = $_COOKIE["nuevatarjeta"];
}

if (isset($_GET["nuevatarjeta"])) {
    setcookie("nuevatarjeta", $_GET["nuevatarjeta"], time() + 5);
    echo "<center><br><h1> Cambiando su tipo de tarjeta...</h1> ";
    echo "<img src='img/loading.gif' /></center>";
    header("refresh:.5;url=pagocookie.php");
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
        <a href='pagocookie.php?nuevatarjeta=cashu'><img src='img/cashu.gif' /></a>&ensp;
        <a href='pagocookie.php?nuevatarjeta=cirrus1'><img src='img/cirrus1.gif' /></a>&ensp;
        <a href='pagocookie.php?nuevatarjeta=dinersclub'><img src='img/dinersclub.gif' /></a>&ensp;
        <a href='pagocookie.php?nuevatarjeta=mastercard1'><img src='img/mastercard1.gif' /></a>&ensp;
        <a href='pagocookie.php?nuevatarjeta=paypal'><img src='img/paypal.gif' /></a>&ensp;
        <a href='pagocookie.php?nuevatarjeta=visa1'><img src='img/visa1.gif' /></a>&ensp;
        <a href='pagocookie.php?nuevatarjeta=visa_electron'><img src='img/visa_electron.gif' /></a>
    </center>
</body>

</html>