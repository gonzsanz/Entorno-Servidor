<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MiniBank</title>
</head>

<body>
    <?php
    if (!empty($_GET['msg'])) echo "RESULTADO:" . $_GET['msg'] . "<br>";
    ?>
    <form action="minibancopro.php" method="POST">
        Importe de la operación: <input name="importe" type="text" focus><br>
        <input type="submit" name="Orden" value="Ingreso">
        <input type="submit" name="Orden" value="Reintegro">
        <input type="submit" name="Orden" value="Ver saldo">
        <input type="submit" name="Orden" value="Terminar">
    </form>
</body>

</html