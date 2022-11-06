<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino</title>
</head>

<body>
    <?php
    session_start();
    echo "RESULTADO DE LA APUESTA : " . $_SESSION["resultado"] . "<br><br>";
    echo "Dispone de " . $_SESSION['dinero'] . " para jugar <br> <br>"; ?>
    <form action="procesar.php" method="POST">
        Cantidad a apostar: <input type="number" name="apostado" required> <br><br>
        Tipo de apuesta: <input type="radio" name="apuesta" value="par" required> Par
        <input type="radio" name="apuesta" value="impar" required> impar <br><br>
        <input type="submit" name="boton" value="Apostar">
        <input type="submit" name="boton" value="Abandonar">
    </form>


</body>

</html>