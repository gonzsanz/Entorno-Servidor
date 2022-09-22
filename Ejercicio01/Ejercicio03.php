<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 3</h1>
</head>

<body>
    <code>
        <?php

        $numero = random_int(1, 9);
        echo "Número generado: " . $numero . "<br>";
        for ($i = 1; $i <= $numero; $i++) {
            for ($s = 1; $s <= $numero - $i; $s++) {
                echo '&nbsp;';
            }
            for ($j = 1; $j <= 2 * $i - 1; $j++) { // Imprime el número de estrellas
                echo '*';
            }
            echo '<br>';
        }
        ?>
    </code>
</body>

</html>