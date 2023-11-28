<?php

session_start();

if (isset($_SESSION["nombre"])) {
    echo "<h2>Gracias, " . $_SESSION["nombre"] . ", por tu pedido.</h2>";
} else {
    echo "<h2>Gracias por tu pedido.</h2>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
</head>

<body>


    <form action="pedido.php" method="POST">
        <input type="submit" value="Volver al menú de pedidos">
    </form>

</body>

</html>