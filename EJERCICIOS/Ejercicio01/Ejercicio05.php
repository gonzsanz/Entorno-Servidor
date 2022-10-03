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
    ?>
    <table border="1px">
        <tr>
            <th style="color: blue;background-color:gray;">Operación</th>
            <th style="color: blue; background-color:gray;">Resultado</th>
        </tr>
        <tr>
            <td><?php echo $numero1 . "+" . $numero2 ?></td>
            <td><?php echo $numero1 + $numero2 ?></td>
        </tr>
        <tr>
            <td><?php echo $numero1 . "-" . $numero2 ?></td>
            <td><?php echo $numero1 - $numero2 ?></td>
        </tr>
        <tr>
            <td><?php echo $numero1 . "*" . $numero2 ?></td>
            <td><?php echo $numero1 * $numero2 ?></td>
        </tr>
        <tr>
            <td><?php echo $numero1 . "/" . $numero2 ?></td>
            <td><?php echo $numero1 / $numero2 ?></td>
        </tr>
        <tr>
            <td><?php echo $numero1 . "%" . $numero2 ?></td>
            <td><?php echo $numero1 % $numero2 ?></td>
        </tr>
        <tr>
            <td><?php echo $numero1 . "**" . $numero2 ?></td>
            <td><?php echo $numero1 ** $numero2 ?></td>
        </tr>

    </table>

</body>