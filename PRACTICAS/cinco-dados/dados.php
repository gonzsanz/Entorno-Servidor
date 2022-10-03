<?php

$dados = array(
    1 => "&#9856;",
    2 => "&#9857;",
    3 => "&#9858;",
    4 => "&#9859;",
    5 => "&#9860;",
    6 => "&#9861;",
);

function tirarDados($dados) {

    $nuevo = array();
    $cont = 0;
    for ($i = 1; $i < 6; $i++) {
        $nuevo[$i] = array_rand($dados);;
    }
    return $nuevo;
}

function calcular_puntos($jugador) {
    $sum = array_sum($jugador);
    $max = max($jugador);
    $min = min($jugador);
    return $sum - $max - $min;
}

function ganador($jugador1, $jugador2) {
    $puntos1 = calcular_puntos($jugador1);
    $puntos2 = calcular_puntos($jugador2);
    if ($puntos1 > $puntos2) {
        return "Gana el jugador 1";
    } else if ($puntos1 < $puntos2) {
        return "Gana el jugador 2";
    } else {
        return "Empate";
    }
}

function mostrar_dados($jugador, $dados) {
    foreach ($jugador as $key => $value) {
        echo '<td style="font-size: 50px;">' . $dados[$value] . '</td>';
    }
}
