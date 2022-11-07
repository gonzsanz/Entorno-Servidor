<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia</title>
</head>

<body>
    <h1>AGENCIA DE VIAJES</h1>
    <h3>BIENVENIDO AL FORMULARIO DE SOLICITUD DE VIAJE</h3>
    <form action="procesar.php" method="POST">
        Nombre: <input type="text"><br><br>
        Apellidos: <input type="text"><br><br>
        Elige los viajes que quiere reservar: <br>
        <select name="viajes[]" multiple size=7>
            NUEVA YORK<option>nuevayork</option>
            MIAMI<option>miami</option>
            INGLATERRA<option selected="selected">inglaterra</option>
            EDIMBURGO<option selected="selected">edimburgo</option>
            SUECIA<option>suecia</option>
            PORTUGAL<option>portugal</option>
            AMSTERDAM<option>amsterdam</option>
        </select>
        Introduzca su email: <input type="mail">
        ¿Desea recibir nuestro newsletter?
        <input type="checkbox" name="informacion" value="si">SI
        <input type="checkbox" name="informacion" value="no">NO <br>
        <h4>Zonas de interés de los que desea recibir informacion</h4>
        Playa <input type="checkbox" name="sitios[]" value="playa">
        Rural <input type="checkbox" name="sitios[]" value="rural">
        Cultural <input type="checkbox" name="sitios[]" value="cultural"> <br>
        ¿Tiene tarjeta de socio con nosotros?
        Si<input type="radio" name="fidelidad" value="si">
        No<input type="radio" name="fidelidad" value="no"><br>
        <input type="submit" name="Enviar" value="Enviar">
        <input type="submit" name="Terminar" value="Terminar">
    </form>
</body>

</html>