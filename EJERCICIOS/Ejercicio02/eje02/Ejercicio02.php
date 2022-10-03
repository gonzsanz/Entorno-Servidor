<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 2</h1>
</head>

<body>
    <?php
    require_once "funcionesvar.php";

    $numero1 = random_int(1, 10);
    $numero2 = random_int(1, 10);

    echo calcularSuma($numero1, $numero2) . "<br>";
    echo calcularResta($numero1, $numero2) . "<br>";
    echo calcularMultiplicacion($numero1, $numero2) . "<br>";
    echo calcularDivision($numero1, $numero2) . "<br>";
    echo calcularModulo($numero1, $numero2) . "<br>";
    echo calcularPotencia($numero1, $numero2) . "<br>";
    ?>


</body>

</html>