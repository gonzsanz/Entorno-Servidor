<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>

<body>
    <h1>La Frutería del siglo XXI</h1>
    <?php

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET['nombre'])) {
        include 'index.html';
    }

    if (($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['nombre']))) {

        $_SESSION['nombre'] = $_GET['nombre'];
        include 'realizar_pedido.php';
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($_POST['boton'] == 'Anotar') {

            if (empty($_SESSION['pedido'][$_POST['fruta']])) {

                $_SESSION['pedido'][$_POST['fruta']] = $_POST['cantidad'];
            } else {

                $_SESSION['pedido'][$_POST['fruta']] += $_POST['cantidad'];
            }

            include 'mostrar_pedido.php';
            include 'realizar_pedido.php';
        } else {

            include 'mostrar_pedido.php';
            include 'finalizar.php';
        }
    }

    ?>

</body>

</html>