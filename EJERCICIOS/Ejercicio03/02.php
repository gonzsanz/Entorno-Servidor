<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php

    $medios = [
        "El pais" => "https://elpais.com/",
        "El mundo" => "https://www.elmundo.es/",
        "ABC" => "https://www.abc.es/",
        "La Vanguardia" => "https://www.lavanguardia.com",
        "El Periódico" => "https://www.elperiodico.com/es/"
    ];

    ?>

    <ul>
        <?php
        foreach ($medios as $nombre => $url) {
            echo "<li><a href='$url'>$nombre</a></li>";
        }
        ?>
    </ul>
</body>

</html>