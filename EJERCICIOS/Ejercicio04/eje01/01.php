<?php

$usuarios = array(
    'david' => 'david',
    'guille' => 'guille',
    'diego' => 'diego'
);

$user = $_POST["user"];
$pass = $_POST["pass"];

if (key_exists($user, $usuarios)) {
    if (!empty($user) && !empty($pass)) {
        if ($usuarios[$user] == $pass) {
            echo 'bienvenido ' . $user;
        } else {
            echo 'Usuario o contraseña incorrectos';
            echo '<input type="button" value="Volver atras" onclick="history.back()">';
        }
    } else {
        echo 'Usuario o contraseña incorrectos';
    }
} else {
    echo 'Usuario o contraseña incorrectos';
    echo '<input type="button" value="Volver atras" onclick="history.back()">';
}
