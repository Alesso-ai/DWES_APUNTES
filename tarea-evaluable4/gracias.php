<?php
// Asegurarse de que la sesión esté iniciada, asumiendo que la información del pedido está almacenada en la sesión
session_start();

// Verificar si la información del pedido está presente en la sesión
if (isset($_SESSION['pedido'])) {
    $pedido = $_SESSION['pedido'];
    // Puedes mostrar los detalles del pedido en el mensaje de agradecimiento
} else {
    // Si no hay información del pedido, redirigir a la página de inicio o a otro lugar apropiado
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por tu pedido</title>
</head>

<body>
    <h1>¡Gracias por tu pedido!</h1>

    <?php
    // Mostrar detalles del pedido si es necesario
    if (isset($pedido)) {
        echo "<p>Tu pedido:</p>";
        // Aquí puedes mostrar los detalles del pedido, por ejemplo:
        // foreach ($pedido as $producto) {
        //     echo "<p>{$producto['nombre']} - {$producto['cantidad']}</p>";
        // }
    }
    ?>

    <!-- Puedes añadir enlaces o botones adicionales según sea necesario -->
    <p><a href="index.php">Volver a la página principal</a></p>
</body>

</html>
