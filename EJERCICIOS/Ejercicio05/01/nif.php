<?php
/*Crea un archivo php llamado nif.php que solicite un número de de DNI y me muestre su letra NIF correspondiente, se tiene que comprobar tanto en la parte cliente como servidor que  elvalor introducido esta formado solo por dígitos. La primera vez se mostrará el formulario y tras rellenar campo DNI se invocará al propio script php por  el método POST para que muestre la letra del NIF correspondiente.*/


checkNumber();

function procesarLetra() {
    $letra = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

    $posicion = $_POST['dni'] % 23;

    echo 'Su letra correspondiente es: ' . $letra[$posicion];
}

function checkNumber() {
    if (is_numeric($_POST['dni'])) {
        procesarLetra();
    } else {
        echo 'No ha introducido solamente números';
    }
}
