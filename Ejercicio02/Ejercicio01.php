<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 1</h1>
</head>

<body>
    <?php

    $a = random_int(1, 10);
    $b = random_int(1, 10);
    $c = 0;
    function elMayor($a, $b, $c) {

        if ($a > $b) {
            $c = $a;
        } elseif ($b > $a) {
            $c = $b;
        } else {
            $c = 0;
        }
        return $c;
    }

    echo "Valor a: " . $a . "<br>";
    echo "Valor b: " . $b . "<br>";
    echo "Valor c: ";
    echo elMayor($a, $b, $c);
    ?>
</body>

</html>