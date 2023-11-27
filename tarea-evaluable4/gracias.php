<?php

session_start();

if (isset($_SESSION["nombre"])) {
    echo "<h2>Gracias, " . $_SESSION["nombre"] . ", por tu pedido.</h2>";
} else {
    echo "<h2>Gracias por tu pedido.</h2>";
}
?>
