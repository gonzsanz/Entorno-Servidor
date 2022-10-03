<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 6</h1>
</head>

<body>
    <h1 style="background-color: blue; color:white; text-align:center;">TABLA DE MULTIPLICAR</h1>
    <?php
    $numero = random_int(1, 10);

    ?>
    <table border="1px">
        <tr>
            <th>Tabla del <?php echo $numero ?>
            <th>&nbsp;
        </tr>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>
                    <td>" . $numero . "x" . $i . "= </td>
                    <td>" . $numero * $i . "</td>
                </tr>";
        }
        ?>

    </table>
</body>

</html>