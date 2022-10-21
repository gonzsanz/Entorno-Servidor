<?php
/*Realizar el programa registrar.php que sirva para dar de alta usuarios en el sistema. El programa mostrará un formulario donde se solicitará un nombre, un correo electrónico y la contraseña dos veces. El programa comprobará que ningún campo está vacío, que el correo tiene un valor correcto de email y que los dos valores de la contraseña coinciden.
La contraseña tiene que ser segura para ello tiene que cumplir las siguientes reglas:
1º Tamaño  igual o superior a 8 caracteres en total.
2º Contiene  caracteres alfabéticos donde hay mayúsculas o minúsculas (una como mínimo de cada).
3º Contiene algún dígito.
4º Contiene algún carácter no alfanumérico ni dígito ni alfabético.

El programa mostrará en mensaje: Usuario registrado o error indicado el tipo de error producido debido a que falta un dato, la contraseñas no coinciden o no cumplen alguna de las reglas de seguridad.
Nota: Si es posible el chequeo también se hará, por lo menos lo más sencillo, en la parte cliente (javascripts)*/

echo '<pre>';
print_r($_POST);
echo '</pre>';

comprobarDatos();


// Comprobar que todos los datos han sido enviados
function comprobarDatos() {

    $post = (isset($_POST['user']) && !empty($_POST['user'])) &&
        (isset($_POST['mail']) && !empty($_POST['mail'])) &&
        (isset($_POST['pass']) && !empty($_POST['pass'])) &&
        (isset($_POST['pass2']) && !empty($_POST['pass2']));

    if ($post) {
        comprobarMail();
    } else {
        echo 'Faltan campos por rellenar';
    }
}

// Comprobar que el correo tiene un valor correcto
function comprobarMail() {

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        comprobarPassword();
    } else
        echo 'Correo electrónico introducido no válido';
}

// Comprobar que la contraseña cumple con los requisitos mínimos
function comprobarPassword(): bool {

    $length = 8;
    $mayus = '/[A-Z]/';
    $minus = '/[a-z]/';
    $digit = '/[0-9]/';
    $no_alphanumeric = '/[@#%{)_.,!?]/';

    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    if (empty($pass) || empty($pass2)) {
        echo 'Porfavor introduzca una contraseña';
        return false;
    }

    if (strlen($pass) < $length) {
        echo 'Contraseña demasiado corta';
        return false;
    }
    if (!preg_match($mayus, $pass)) {
        echo 'La contraseña debe contener mínimo una mayúscula';
        return false;
    }
    if (!preg_match($minus, $pass)) {
        echo 'La contraseña debe contener mínimo una minúscula';
        return false;
    }
    if (!preg_match($digit, $pass)) {
        echo 'La contraseña debe contener mínimo un número';
        return false;
    }
    if (!preg_match($no_alphanumeric, $pass)) {
        echo 'La contraseña debe contener mínimo un caracter no alfanumérico';
        return false;
    }
    if ($pass != $pass2) {
        echo 'Las contraseñas no coinciden';
        return false;
    }

    echo 'Usuario registrado';
    return true;
}
