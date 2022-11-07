
<?php
session_start();
include_once("funcionesViajes.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENCIA DE VIAJES</title>
</head>
<body>
    <h1>AGENCIA DE VIAJES</h1>
<?php
//Si nombre está vacío se muestra el formulario de registro del cliente
if((!isset($_SESSION["nombre"]))){
    ?>
    <h2>BIENVENIDO AL FORMULARIO DE SOLICITUD DE VIAJE</h2>
    <hr>
    <form action="#" method=GET>
        <p>
            <label for="">Nombre: </label>
            <input type="text" name="nombre">
        </p>
        <p>
            <label for="">Apellidos: </label>
            <input type="text" name="apellidos">
        </p>
        <p>
            <label for="">Elige los viajes que quiere reservar: </label>
        </p>
        <p>
        <select name="viajes[]" multiple size=7>
                NUEVA YORK<option>nuevayork</option>
                MIAMI<option>miami</option>
                INGLATERRA<option selected="selected">inglaterra</option>
                EDIMBURGO<option selected="selected">edimburgo</option>
                SUECIA<option>suecia</option>
                PORTUGAL<option>portugal</option>
                AMSTERDAM<option>amsterdam</option>
        </select>
        </p>
        <p>
            <label for="">Introduzca su email: </label>
            <input type="text" name="correo"> 
        </p>
        <p>
            <label for="">¿Desea inscribirse a nuestra newsletter?</label>
            <input type="checkbox" name="informacion" value="si">
            <input type="checkbox" name="informacion" value="no">
        </p>
        <h4>Zonas de interés de los que desea recibir información:</h4>
            Playa <input type="checkbox" name="sitios[]" value="playa" >
            Rural <input type="checkbox" name="sitios[]" value="rural" >
            Cultural <input type="checkbox" name="sitios[]" value="cultural">
        <p>
            <label for="">¿Tiene tarjeta de socio con nosotros?
            Si<input type="radio" name="fidelidad" value="SI">
            No<input type="radio" name="fidelidad" value="NO">
        </p>
        <input type="submit" name="Enviar" value="Enviar">
        <input type="submit" name="Terminar" value="Terminar">
        
    </form>
<?php
}else{
    if(isset($_GET["Enviar"])){
    ?>
    <h2>RESULTADOS DEL REGISTRO DEL CLIENTE:</h2>
    <hr>
    <h3>Nombre: <?php echo $_SESSION["nombre"]?></h3>
    <h3>Apellidos: <?php echo $_SESSION["apellidos"]?></h3>
    <h3>¿Tiene tarjeta de socio con nosotros?: <?php echo $_COOKIE["fidelidad"]?></h3>
    <h3>Viajes que quiere reservar: <?php echo $_COOKIE["viajes"]?></h3>
    <h3>Correo: <?php echo $_COOKIE["correo"]?></h3>
    <h3>¿Desea inscribirse a nuestra newsletter?: <?php echo $_COOKIE["informacion"]?></h3>
    <h3>Zonas de interés de las que desea recibir información: <?php foreach($_SESSION["sitios"] as $valor){ echo $valor." ,";}?></h3>
    <form action="#" method=GET>
        
        <input type="submit" name="Terminar" value="Terminar">
        
    </form>
<?php
}
if(isset($_GET["Terminar"])){
    codigoViaje();
    ?>
    
    <h2>Su código de reserva es <?php echo $_COOKIE["codigoViaje"]?></h2>
    <h3>Le llegará un mensaje para proceder al pago del viaje</h3>
    <h1>MUCHAS GRACIAS POR REGISTRARSE Y RESERVAR UN VIAJE</h1>
    <?php echo "<input type='button' name='nuevo_registro' value='NUEVO REGISTRO' onclick='location.href=\"" . $_SERVER['PHP_SELF'] . "\"' >";?>
    <?php
    //Cerramos la sesión
    session_destroy();
    //Cerramos las cookies
    setcookie("codigoViaje",$codigo,time()-3600);
    setcookie("fidelidad",$fidelidad,time()-3600);
    setcookie("viajes",$viajesReservados,time()-3600);
    setcookie("informacion",$informacion,time()-3600);
    setcookie("correo",$correo,time()-3600);


    }
}
?>
</body>
</html>
