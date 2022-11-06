<?php

$edad = "";
$genero = "";
$deportes[] = "";

if (isset($_REQUEST["orden"])) {
    if ($_REQUEST["orden"] == "Confirmar") {
        if (isset($_COOKIE["edad"])) {
            $edad = $_REQUEST["edad"];
            setcookie("edad", $edad, time() + 7 * 24 * 60 * 60);
        }
        if (isset($_COOKIE["genero"])) {
            $genero = $_REQUEST["genero"];
            setcookie("genero", $genero, time() + 7 * 24 * 60 * 60);
        }
        if (isset($_COOKIE["deportes"])) {
            $deportes = $_REQUEST["deportes"];
            setcookie('deportes', implode(",", $deportes), time() + 5);
        }
    }
    if ($_REQUEST["orden"] == "Eliminar") {
        setcookie("edad", null, time() - 5);
        setcookie("genero", null, time() - 5);
        setcookie("deportes", null, time() - 5);
    }
} else {
    // No hay orden, se muestra el formulario por primera vez
    if (isset($_COOKIE['edad'])) {
        $edad = $_COOKIE['edad'];
    }
    if (isset($_COOKIE['genero'])) {
        $genero = $_COOKIE['genero'];
    }
    if (isset($_COOKIE['deportes'])) {
        $deportes = explode(",", $_COOKIE['deportes']);
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 400px;">
        <div id="header">
            <h1>SUS DATOS ALMACENADOS</h1>
        </div>

        <div id="content">
            <fieldset>
                <form method="POST">
                    <label>Edad</label> <input type="number" name="edad" size="4" value="<?= isset($edad) ? $edad : '' ?>"><br>
                    Género :<br>
                    <label> Mujer </label>
                    <input type="radio" name="genero" value="Mujer" <?= ($genero == 'Mujer') ? "checked= \"checked\"" : ""; ?>>
                    <label> Hombre</label>
                    <input type="radio" name="genero" value="Hombre" <?= ($genero == 'Hombre') ? "checked= \"checked\"" : ""; ?>>
                    <br>
                    <label>Deportes</label><br>
                    <select name="deportes[]" multiple="multiple" size="3">
                        <option value="Futbol" <?= in_array("Futbol", $deportes) ? "selected=\"selected\"" : ""; ?>>Futbol</option>
                        <option value="Tenis" <?= in_array("Tenis", $deportes) ? "selected=\"selected\"" : ""; ?>>Tenis</option>
                        <option value="Ciclismo" <?= in_array("Ciclismo", $deportes) ? "selected=\"selected\"" : ""; ?>>Ciclismo</option>
                        <option value="Otro" <?= in_array("Otro", $deportes) ? "selected=\"selected\"" : ""; ?>>Otro</option>
                    </select>
                    <br>
                    <button name="orden" value="Confirmar"> Almacenar valores </button>
                    <button name="orden" value="Eliminar"> Eliminar valores </button>
                </form>
            </fieldset>
        </div>
    </div>
</body>

</html>