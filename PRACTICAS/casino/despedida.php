<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino</title>
</head>

<body>
    <?php session_start() ?>
    <h1>Gracias por jugar con nosotros</h1>
    <h2>Su resultado final es de <?php echo $_SESSION["dinero"] ?> Euros</h2>
    <input type="submit" value="Nueva partida" onclick="location.href='index.php'">
    <?php session_destroy(); ?>
</body>

</html>