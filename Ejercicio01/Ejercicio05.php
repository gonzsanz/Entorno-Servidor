<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 5</h1>
</head>

<body>
    <?php
    $numero1 = random_int(1, 10);
    $numero2 = random_int(1, 10);
    echo "1º Número : " . $numero1 . "<br>";
    echo "2º Número : " . $numero2 . "<br>";
    echo "<br>";
    // cREAR UNA TABLA CON 2 FILAS Y 2 COLUMNAS
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>" . $numero1 . "</td>";
    echo "<td>" . $numero2 . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $numero1 . "</td>";
    echo "<td>" . $numero2 . "</td>";
    echo "</tr>";
    echo "</table>";

    ?>

</body>