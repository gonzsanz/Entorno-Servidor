<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> las frutas </title>
</head>

<body>
    <form>
        <fieldset>
            <legend>Sus frutas preferidas </legend>
            <label for="nombre">Lista de frutas:</label><br>
            <select name="listafrutas[]" multiple>
                <option value="Platano">Platano</option>
                <option value="fresa">fresa</option>
                <option value="Naranja">Naranja</option>
                <option value="Melón">Melón</option>
                <option value="Manzana">Manzana</option>
            </select>
            <input type="submit" value="Cambiar">
        </fieldset>
    </form>
</body>

</html>
<?php


// Crea la cookie pero no la muestra

if (isset($_REQUEST['listafrutas'])) {
    $frutas = $_REQUEST['listafrutas'];
    $frutas = implode(",", $frutas);
    setcookie("frutas", $frutas, time() + 3600);
} else {
    if (isset($_COOKIE['frutas'])) {
        $frutas = $_COOKIE['frutas'];
        $frutas = explode(",", $frutas);
    }
}

?>