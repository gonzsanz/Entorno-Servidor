<?php

require_once "vendor/autoload.php";

$html = "<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Datos $cli->first_name</title>
        <style>
            body{
                font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
                font-size: 20px;
            }
            h1{
                color: #0000FF;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
            }
            th {
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h1>Informe $cli->first_name $cli->last_name</h1>
        <table>
            <tr>
                <td>id:</td>
                <td>$cli->id</td>
                <td rowspan='7'>
                    FOTO
                </td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>$cli->first_name</td>
            </tr>
            <tr>
                <th>Apellido:</th>
                <td>$cli->last_name</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>$cli->email</td>
            </tr>
            <tr>
                <th>Género:</th>
                <td>$cli->gender</td>
            </tr>
            <tr>
                <th>IP:</th>
                <td>$cli->ip_address</td>
            </tr>
            <tr>
                <th>Teléfono:</th>
                <td>$cli->telefono</td>
            </tr>
            </table>
    </body>
</html>";

$mpdf = new \Mpdf\Mpdf;
$mpdf->WriteHTML($html);
$mpdf->Output();
