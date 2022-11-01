<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>

<body>

    <h4>Este es su pedido: </h4>

    <?php
    if (!empty($_SESSION['pedido'])) {

        crearPedido();
    } else {
        echo "No te llevas nada.";
    }

    function crearPedido() {
        echo '<table style="border: 1px solid black">';
        foreach ($_SESSION['pedido'] as $key => $value) {
            echo "<tr>";
            echo "<td> <b>$key</b>  $value </td>";
            echo "</tr>";
        }
    }
    ?>
    </table>
</body>

</html>