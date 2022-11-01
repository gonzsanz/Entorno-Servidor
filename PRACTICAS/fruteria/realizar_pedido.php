<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>

<body>

    <?php $nombre = $_SESSION['nombre']; ?>

    <h3>REALICE SU COMPRA <?php echo  strtoupper($nombre) ?></h3>

    <form action="lafruteria.php" method="POST">

        <label><b>Seleccione la fruta:</b>

            <select name="fruta" required>
                <option value="Naranjas">Naranjas</option>
                <option value="Limones">Limones</option>
                <option value="Platanos">Platanos</option>
                <option value="Manzanas">Manzanas</option>
            </select>

        </label>

        <label><b>Cantidad: </b><input type="number" name="cantidad" required></label>

        <input type="submit" value="Anotar" name="boton">
        <input type="submit" value="Terminar" name="boton">

    </form>
</body>

</html>