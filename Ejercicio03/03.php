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

    $periodico = array_rand($medios, 1);

    echo "El medio recomendado es: <a href='$medios[$periodico]'>$periodico</a>";

    ?>
</body>

</html>