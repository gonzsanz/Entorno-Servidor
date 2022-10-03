<html>

<head>
    <meta charset="UTF-8" />
    <h1>Ejercicio 1</h1>
</head>

</html>
// Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y
// mostrar su suma, su resta, su división, su multiplicación, módulo y potencia (ciclo for)
<?php
$numero1 = random_int(1, 10);
$numero2 = random_int(1, 10);

echo "1º Número : " . $numero1 . "<br>";
echo "2º Número : " . $numero2 . "<br>";
echo "<br>";
echo $numero1 . "+" . $numero2 . " = " . $numero1 + $numero2 . "<br>";
echo $numero1 . "-" . $numero2 . " = " . $numero1 - $numero2 . "<br>";
echo $numero1 . "*" . $numero2 . " = " . $numero1 * $numero2 . "<br>";
echo $numero1 . "/" . $numero2 . " = " . $numero1 / $numero2 . "<br>";
echo $numero1 . "%" . $numero2 . " = " . $numero1 % $numero2 . "<br>";
echo $numero1 . "**" . $numero2 . " = " . $numero1 ** $numero2 . "<br>";

// Con ciclo for
// $potencia = 1;
// for ($i = 1; $i <= $numero2; $i++) {
//     $potencia = $potencia * $numero1;
// }
// echo $potencia;


?>