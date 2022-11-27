<?php
require_once('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login, $clave): bool {
    global $usuarios;
    foreach ($usuarios as $key => $value) {
        if ($key == $login && $value[1] == $clave) {
            return true;
        }
    }
    return false;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login) {

    global $usuarios;
    foreach ($usuarios as $key => $value) {
        if ($key == $login) {
            return $value[2];
        }
    }

    return 0;
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo): String {
    $msg = "";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    $msg .= " Bienvenido/a alumno/a: " . $usuarios[$codigo][0];
    $msg .= "<table>";
    $msg .= "<tr><th>Módulo</th><th>Nota</th>";
    for ($i = 0; $i < count($nombreModulos); $i++) {
        $msg .= "<tr>
            <td>" . $nombreModulos[$i] . "</td>
            <td>" . $notas[$codigo][$i] . "</td>
            </tr>";
    }
    $msg .= "</table>";
    return $msg;
}


/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas($codigo): String {
    $msg = "";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    $msg .= " Bienvenido Profesor: " . $usuarios[$codigo][0];
    $msg .= "<table>";
    $msg .= "<tr><th>Nombre</th>";
    foreach ($nombreModulos as $key) {
        $msg .= "<th>" . $key . "</th>";
    }
    $msg .= "</tr>";

    foreach ($notas as $key => $value) {
        $msg .= "<tr><td>" . $usuarios[$key][0] . "</td>";
        foreach ($value as $key2 => $value2) {
            $msg .= "<td>" . $value2 . "</td>";
        }
        $msg .= "</tr>";
    }

    $msg .= "</table>";
    return $msg;
}
