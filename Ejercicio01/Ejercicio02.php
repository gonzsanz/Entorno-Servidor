<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 2</h1>
</head>

<body>
    <code>
        <?php

        $numero = random_int(1, 9);
        echo "Número generado: " . $numero . "<br>";
        for ($i = 1; $i <= $numero; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                if ($i % 2 == 0) {
                    echo '<span style="color:red">' . $i . '</span>';
                } else {
                    echo '<span style="color:blue">' . $i . '</span>';
                }
            }
            echo "<br>";
        }
        ?>
    </code>
</body>

</html>