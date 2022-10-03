<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>

<body>

    <?php

    $miarray = [];

    for ($i = 0; $i < 20; $i++) {
        $miarray[$i] = random_int(1, 10);
    }
    function mostrarArray($miarray) {
        for ($i = 0; $i < count($miarray); $i++) {
            echo "<td>" . $miarray[$i] . "</td>";
        }
    }
    function valorMaximo($miarray){
        $maximo = 0;
        for ($i = 0; $i < count($miarray); $i++) {
            if ($miarray[$i] > $maximo) {
                $maximo = $miarray[$i];
            }
        }
        echo $maximo;
    }
    function valorMinimo($miarray){
        $minimo = 11;
        for ($i = 0; $i < count($miarray); $i++) {
            if ($miarray[$i] < $minimo) {
                $minimo = $miarray[$i];
            }
        }
        echo $minimo;
    }
    ?>
    <table border="1px">
        <tr>
            <?php
            mostrarArray($miarray);
            ?>
        </tr>
    </table>
    <p>El valor máximo es: <?php valorMaximo($miarray); ?></p>
    <p>El valor mínimo es: <?php valorMinimo($miarray); ?></p>
</body>

</html>