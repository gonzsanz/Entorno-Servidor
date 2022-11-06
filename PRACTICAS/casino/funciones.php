<?php

function apuesta($cantidad) {
    if (comprobarSaldo()) {
        $aleatorio = rand(0, 36);
        if ($aleatorio % 2 == 0) {
            $resultado = "par";
            $_SESSION["resultado"] = "PAR";
        } else {
            $resultado = "impar";
            $_SESSION["resultado"] = "IMPAR";
        }

        if ($_SESSION["apuesta"] == $resultado) {
            $_SESSION["dinero"] += $cantidad;
        } else {
            $_SESSION["dinero"] -= $cantidad;
        }
    }
}

function comprobarSaldo() {
    if ($_SESSION["dinero"] > $_SESSION["apostado"]) {
        return true;
    }
    return false;
}
