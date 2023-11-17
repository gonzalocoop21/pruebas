<?php
$servidor = "mangito.mysql.database.azure.com";
$usuario = "azureuser";
$contrasena = "123456Aa";
$base_de_datos = "tienda";
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Carrito</title>
    <style>
        .styled-table thead tr {
            background-color: #eb920e;
            color: #ffffff;
            text-align: middle;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        /* Otros estilos necesarios */
    </style>
    <a href="tienda.php">
        <p>Regresar</p>
    </a>
</head>

<body>
    <h1>Carrito</h1>
    <br>
    <table class="styled-table">
        <thead>
            <tr>
                <th>id</th>
                <th>producto</th>
                <th>cantidad</th>
                <th>precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM carrito";
            $result = mysqli_query($conexion, $sql);

            if (!$result) {
                die("Error al consultar la base de datos: " . mysqli_error($conexion));
            }

            while ($mostrar = mysqli_fetch_array($result)) :
            ?>
                <tr>
                    <td><?= htmlspecialchars($mostrar['id']) ?></td>
                    <td><?= htmlspecialchars($mostrar['titulo']) ?></td>
                    <td><?= htmlspecialchars($mostrar['cantidad']) ?></td>
                    <td><?= htmlspecialchars($mostrar['precio']) ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</body>

</html>