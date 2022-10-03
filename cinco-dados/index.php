<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>

<body>
    <?php
    include "dados.php";

    $jugador1 =  tirarDados($dados);
    $jugador2 =  tirarDados($dados);

    echo "<h1>Cinco dados</h1>";
    echo "<p>Actualice la página para volver a tirar los dados</p>";
    echo
    '<table style="font-size:30px;">
        <tr style="background-color:red;">
            <th>Jugador 1</th>';
    mostrar_dados($jugador1, $dados);

    echo '<th>' . calcular_puntos($jugador1) . ' puntos</th>
        </tr>';
    echo
    '<tr style="background-color:cyan;">
            <th>Jugador 2</th>';

    mostrar_dados($jugador2, $dados);

    echo '<th>' . calcular_puntos($jugador2) . ' puntos</th>
        </tr>
        <tr>
            <th colspan="9">' . ganador($jugador1, $jugador2) . '</th>
        </tr>
    </table>';

    ?>
</body>

</html>