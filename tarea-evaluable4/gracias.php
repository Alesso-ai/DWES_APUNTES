<?php

session_start();

if (isset($_SESSION['pedido'])) {
    $pedido = $_SESSION['pedido'];
} else {
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

    if (isset($pedido)) {
        echo "<p>Tu pedido:</p>";
    }
    ?>


    <p><a href="index.php">Volver a la página principal</a></p>
</body>

</html>