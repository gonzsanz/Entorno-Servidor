<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="style.css" rel="stylesheet" />
    <title>Piedra,papel,tijera</title>

</head>

<body>
    <h1>¡Piedra, papel, tijera!</h1>
    <p>Actualice la página para mostrar otra partida</p>

    <?php

    define('PIEDRA1',  "&#x1F91C;");
    define('PIEDRA2',  "&#x1F91B;");
    define('TIJERAS',  "&#x1F596;");
    define('PAPEL',    "&#x1F91A;");

    $j1 = random_int(1, 3);
    $j2 = random_int(1, 3);


    function juego($jugador1, $jugador2) {

        if ($jugador1 == 1  && $jugador2 == 2) {
            return "Ha ganado el jugador 2";
        } else if ($jugador1 == 1  && $jugador2 == 3) {
            return "Ha ganado el jugador 1";
        } else if ($jugador1 ==  $jugador2) {
            return "¡EMPATE!";
        } else if ($jugador1 == 2 && $jugador2 == 1) {
            return "Ha ganado el jugador 1";
        } else if ($jugador1 == 2 && $jugador2 == 3) {
            return "Ha ganado el jugador 2";
        } else if ($jugador1 == 3 && $jugador2 == 1) {
            return "Ha ganado el jugador 2";
        } else if ($jugador1 == 3 && $jugador2 == 2) {
            return "Ha ganado el jugador 1";
        }
    }

    function emojis($j1, $j2) {

        if ($j1 == 1) echo PIEDRA1;
        if ($j1 == 2) echo PAPEL;
        if ($j1 == 3) echo TIJERAS;
        if ($j2 == 1) echo PIEDRA2;
        if ($j2 == 2) echo PAPEL;
        if ($j2 == 3) echo TIJERAS;
    }
    ?>
    <p><b>Jugador 1 &emsp; &emsp;&emsp; Jugador 2</b></p>
    <p class="juego"><?php echo emojis($j1, $j2) ?></p>

    <p><b><?php echo juego($j1, $j2); ?></b></p>


</body>

</html>