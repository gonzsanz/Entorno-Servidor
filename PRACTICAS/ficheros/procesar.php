<?php


// Comprobar que no supera los 300Kb todas las imagenes
if (calcularTamañoTotal() > 300000) {
    echo 'Los archivos superan los 300kb.';
    exit();
}

foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {

    $nombre = $_FILES['archivos']['name'][$key];
    $dir = "./imgusers/" . $_FILES['archivos']['name'][$key]; // directorio al que se suben con su nombre
    $permitidos = array('png', 'jpg', 'jpeg'); // extensiones permitidas
    $separar = explode('.', $_FILES['archivos']['name'][$key]); // separo el nombre del archivo por el '.'
    $extension = strtolower(end($separar)); // obtengo la extensión del archivo

    // Comprobar que la extensión es válida
    if (in_array($extension, $permitidos)) {

        // Comprobar que el archivo no supera los 200Kb
        if ($_FILES['archivos']['error'][$key] != 2) {

            // Subir el archivo
            if (!file_exists($dir)) {

                // Si no existe un archivo con ese nombre, comprobar si se ha subido el archivo
                if (move_uploaded_file($_FILES['archivos']['tmp_name'][$key], $dir)) {
                    echo "Archivo <b>$nombre</b> subido correctamente.<br>";
                } else {
                    echo "No se pudo subir el archivo <b>$nombre</b>. <br>";
                }
            } else {
                echo "Error al subir: El archivo <b>$nombre</b> ya existe. <br>";
            }
        } else {
            echo "El archivo <b>$nombre</b> supera el tamaño permitido. <br>";
        }
    } else {
        echo "Formato de archivo <b>$nombre</b> no permitido. <br>";
    }
}

// Obtener el tamaño de todos los archivos
function calcularTamañoTotal() {

    $tamaño_total = 0;
    foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {

        $tamaño_total += $_FILES['archivos']['size'][$key];
    }
    return $tamaño_total;
}
