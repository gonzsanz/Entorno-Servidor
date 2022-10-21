<div>
    <b> Detalles:</b><br>
    <table>
        <tr>
            <td>Longitud: </td>
            <td><?= comprobarInyeccion(strlen($_REQUEST['comentario'])) ?></td>
        </tr>
        <tr>
            <td>Nº de palabras: </td>
            <td><?= comprobarInyeccion(contarPalabras($_REQUEST['comentario']))  ?></td>
        </tr>
        <tr>
            <td>Letra + repetida: </td>
            <td><?= comprobarInyeccion(contarLetra($_REQUEST['comentario'])) ?></td>
        </tr>
        <tr>
            <td>Palabra + repetida:</td>
            <td><?= comprobarInyeccion(palabraRepetida($_REQUEST['comentario'])) ?></td>
        </tr>
    </table>
</div>