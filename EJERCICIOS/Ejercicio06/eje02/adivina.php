<?php

session_start();
define("INTENTOS", 5);


if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = random_int(1, 20);
    $_SESSION["intentos"] = 0;
} else {
    if (isset($_POST["numero"])) {
        if (comprobarNumero($_POST["numero"])) {
            echo "Has adivinado el número <br>";
            session_destroy();
            echo '<a href="' . $_SERVER["PHP_SELF"] . '"> Otra partida </a>';
        } else {
            $_SESSION["intentos"]++;
        }
    }
    if ($_SESSION["intentos"] >= INTENTOS) {
        echo "Has superado el límite de fallos <br>";
        echo "El número era: " . $_SESSION["numero"] . "<br>";
        session_destroy();
        echo '<a href="' . $_SERVER["PHP_SELF"] . '"> Otra partida </a>';
    }
}


function comprobarNumero($numero) {
    if ($_SESSION["numero"] == $numero) {
        return true;
    }
    if ($_SESSION["numero"] < $numero) {
        echo "El número es menor";
        return false;
    }
    if ($_SESSION["numero"] > $numero) {
        echo "El número es mayor";
        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Adivina</title>
</head>

<body>
    <form method="POST">
        Introduzca un número<input type="number" name="numero">
    </form>

    <?php echo "Nº de fallos: " . $_SESSION["intentos"]; ?>
</body>

</html>