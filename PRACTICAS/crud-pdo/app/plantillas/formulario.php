<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD DE USUARIOS</title>
    <link href="web/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 600px;">
        <div id="header">
            <h1>GESTIÓN DE USUARIOS versión 1.1 + BD</h1>
        </div>
        <div id="content">
            <hr>
            <form method="POST">
                <table>
                    <tr>
                        <td>Id </td>
                        <td>
                            <input type="text" name="id" value="<?= $user->id ?>" <?= ($orden == "Detalles" || $orden == "Modificar") ? "readonly" : "" ?> size="5" autofocus>
                        </td>
                    </tr>
                    <tr>
                        <td>First_name </td>
                        <td>
                            <input type="text" name="nombre" value="<?= $user->first_name ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size="20" autofocus>
                        </td>
                    </tr>
                    <tr>
                        <td>Last_name </td>
                        <td>
                            <input type="text" name="apellido" value="<?= $user->last_name ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size="20" autofocus>
                        </td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>
                            <input type="mail" name="email" value="<?= $user->email ?>" <?= ($orden == "Detalles" || $orden == "Modificar") ? "readonly" : "" ?> size="20">
                        </td>
                    </tr>
                    <tr>
                        <td>Gender </td>
                        <td>
                            <input type="text" name="genero" value="<?= $user->gender ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=10>
                        </td>
                    </tr>
                    <tr>
                        <td>Ip_address</td>
                        <td>
                            <input type="text" name="ip" value="<?= $user->ip_address ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=20>
                        </td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>
                            <input type="number" name="telefono" value="<?= $user->telefono ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=20>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="orden" value="<?= $orden ?>">
                <input type="submit" name="orden" value="Volver">
            </form>
        </div>
    </div>
</body>

</html>
<?php exit(); ?>