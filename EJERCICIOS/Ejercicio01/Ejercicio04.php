<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 4</h1>
</head>

<body>
    <?php
    $triple6 = false;
    $cont6 = 0;
    $contnum = 0;


    while ($cont6 < 3) {
        $numero = random_int(1, 10);

        if ($numero == 6) {
            $cont6++;
        } else {
            $cont6 = 0;
            $contnum++;
        }
    }
    echo "Han salido tres 6 seguidos tras generar " . $contnum . " números en " . microtime() . " milisegundos";

    ?>
</body>