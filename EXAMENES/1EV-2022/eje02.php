<html>

<head>
    <meta charset="UTF-8">
    <title> Agenda App </title>
</head>

<body>
    <form>
        <fieldset>
            <legend>Su agenda personal</legend>
            <label for="nombre">Nombre:</label><br>
            <input type='text' name='nombre' size=20 value="Ramón">
            <input type='submit' name="orden" value="Consultar"><br>
            <label for="telefono">Teléfono:</label><br>
            <input type='tel' name='telefono' size=20 value="9394848">
            <input type='submit' name="orden" value="Añadir">
            <input type="hidden" name="token" value="123456">
        </fieldset>
    </form>
    <p>Contacto anotado.</p>
</body>

</html>
<?php

switch ($_GET["orden"]) {
    case "Consultar":
        if (isset($_GET["token"]) && $_GET["token"] == "123456")
            consultar();
        break;
    case "Añadir":
        if (isset($_GET["token"]) && $_GET["token"] == "123456")
            anotar();
        break;
}

function limpiarEntrada(string $entrada): string {
    $salida = trim($entrada);
    $salida = stripslashes($salida);
    $salida = htmlspecialchars($salida);
    return $salida;
}

function anotar() {

    $nombre = limpiarEntrada($_GET["nombre"]);
    $telefono = limpiarEntrada($_GET["telefono"]);
    $linea = $nombre . "," . $telefono . "\n";

    if (!is_numeric($telefono)) {
        echo "Por favor introduzca un número válido";
        exit();
    }

    $file = @file_put_contents("contactos.txt", $linea, FILE_APPEND);

    if ($file) {
        echo "Contacto añadido correctamente";
    }
}

function consultar() {
    $nombre = limpiarEntrada($_GET["nombre"]);
    $file = @file_get_contents("contactos.txt");
    $lineas = explode("\n", $file);

    foreach ($lineas as $linea) {
        $datos = explode(",", $linea);
        if ($datos[0] == $nombre) {
            echo "El teléfono de $nombre es $datos[1]";
            exit();
        }
    }

    echo "No se encuentra $nombre en la agenda";
}
?>