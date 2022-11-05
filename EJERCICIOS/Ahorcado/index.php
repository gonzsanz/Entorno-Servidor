<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
</head>

<body>

    <?php

    session_start();
    include 'funciones.php';

    define('MAXFALLOS', 6);
    $msg = "";
    $final = false;

    if (!isset($_SESSION['palabrasecreta'])) {
        $_SESSION['palabrasecreta'] = elegirPalabra();
        $_SESSION['letrasusuario'] = ""; // Inicialmente no tiene ninguna letra  
        $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
        $msg .= " NUEVA PARTIDA <br>";
    }

    if (isset($_REQUEST["letra"])) {
        $letra = $_REQUEST["letra"];
        if (!comprobarLetra($letra, $_SESSION["palabrasecreta"])) {
            $_SESSION["fallos"]++;
            if ($_SESSION["fallos"] >= MAXFALLOS) {
                $msg .= "Has superado el límite de fallos. Has perdido <br>";
                session_destroy();
                $final = true;
            }
        } else {
            $_SESSION["letrasusuario"] .= $letra;
        }
    }

    $palabra = generaPalabraconHuecos($_SESSION["letrasusuario"], $_SESSION["palabrasecreta"]);
    $msg .= "PALABRA: $palabra <br>";

    if ($_SESSION["palabrasecreta"] == $palabra) {
        $msg .= "Enhorabuena has acertado <br>";
        $final = true;
        session_destroy();
    } else {
        $msg .= "Has cometido " . $_SESSION["fallos"] . " fallos <br>";
    }
    ?>

    <div><?= $msg ?> </div>
    <?php if (!$final) : ?>
        <form>
            Introduzca una letra <input type="text" size="1" maxlength="1" name="letra" autofocus>
        </form>
    <?php else : ?>
        <a href="<?= $_SERVER['PHP_SELF'] ?>"> Otra partida </a>
    <?php endif; ?>
</body>

</html>