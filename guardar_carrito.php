<?php
$servidor = "mangito.mysql.database.azure.com";
$usuario = "azureuser";
$contrasena = "123456Aa";
$base_de_datos = "tienda";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['title'], $_POST['price'])) {
    $titulo = $_POST['title'];
    $precio = floatval(str_replace('$', '', $_POST['price']));

    // Utilizar sentencia preparada para la inserción
    $sql = "INSERT INTO carrito (titulo, cantidad, precio) VALUES (?, 1, ?)";
    
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sd", $titulo, $precio);
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro insertado correctamente";
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
