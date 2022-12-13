<?php
/*
Ejemplo de control de acceso consultando a una base de datos

- Manejando la sesión para conectar y desconectar
- Utilizando un timeout para desconectarse a los 60 sg.
- Bloqueando al usuarios si hay más de tres intentos sucesivos
con el mismo usuario.

*/

session_start();

//control de tiempo de sesion

if (isset($_SESSION['tiempo'])) {
    $horaActual = time();
    $tiempoTranscurrido = $horaActual - $_SESSION['tiempo'];
    if ($tiempoTranscurrido >= 60) {
        session_destroy();
        header("Location: ejemploPDOconSesionesBloqueo.php");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 400px;">
        <div id="header">
            <h1>ACCESO AL SISTEMA</h1>
        </div>
        <div id="content">
            <?php

            if (isset($_SESSION['user'])) {
                echo "$_SESSION[user]: Bienvenido al sistema <br>";
                echo " Has entrado $_SESSION[accesos] veces <br>";
            ?>
                <form method="POST">
                    <input type="submit" name="desconectar" value="Desconectar">
                </form>
            <?php
                if (isset($_POST['desconectar'])) {
                    session_destroy();
                    header("Location: ejemploPDOconSesionesBloqueo.php");
                }
                exit();
            }

            $hayerror = true;

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                try {
                    $dsn = "mysql:host=localhost;dbname=Prueba";
                    $dbh = new PDO($dsn, "root", "");
                    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Error de conexión " . $e->getMessage();
                    exit();
                }

                $login  = $_POST['login'];
                $passwd = $_POST['passwd'];

                // Sentencia preparada
                $stmt = $dbh->prepare("SELECT * FROM Users WHERE login = ? and passwd = ?");
                $stmt->bindValue(1, $login);
                $stmt->bindValue(2, $passwd);
                // Devuelvo una tabla asociativa
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                if ($stmt->execute()) {
                    if ($fila = $stmt->fetch()) {
                        //var_dump($fila);
                        if ($fila['bloqueo'] == 1) {
                            echo "Usuario bloqueado";
                        } else {
                            $_SESSION['user'] = $fila['Nombre'];
                            $_SESSION['accesos'] = $fila['accesos'];
                            $_SESSION['tiempo'] = time();
                            $hayerror = false;
                            $fila['accesos']++;
                            $conectado = true;
                            $consulta = "UPDATE Users SET accesos = $fila[accesos]  where login ='$login'";
                            // Consulta directa
                            if ($dbh->exec($consulta) == 0) {
                                echo " ERROR UPDATE en la BD " . print_r($dbh->errorInfo()) . "<br>";
                            }
                            header("refresh: 0;");
                        }
                    } else {
                        echo "El identificador y/o la contraseña no son correctos.<br>";
                    }
                } else {
                    echo " ERROR de consulta a la BD " . print_r($dbh->errorInfo()) . "<br>";
                }
            }
            ?>
            <?php if ($_SERVER['REQUEST_METHOD'] == "GET" || $hayerror) : ?>
                <form name='entrada' method="POST">
                    <table style="border: node; ">
                        <tr>
                            <td>identificador:</td>
                            <td><input type="text" name="login" size="20"></td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td><input type="password" name="passwd" size="20"></td>
                        </tr>
                    </table>
                    <input type="submit" name="orden" value="Entrar">
                </form>
            <?php endif ?>
        </div>
    </div>
</body>

</html>