<?php

function conectarDB()
{
    $cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
    $usuario = "root";
    $clave = "";
    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (PDOException $e) {
        echo "Error de conexión a la BD" . $e->getMessage();
    }
}

$conn = conectarDB();

// Función para listar pizzas, ahora acepta la conexión como parámetro
function listarPizzas($conn)
{
    $consulta = $conn->prepare("SELECT nombre, precio FROM pizza");
    $consulta->execute();

    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . "-->" . $row["precio"] . "€.<br>";
    }
}

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>

<body>
    <?php
    if (isset($_SESSION["nombre"])) {
        echo "<h2>Bienvenido " . $_SESSION["nombre"] . "</h2>";
    }
    echo "<h1>Nuestras Pizzas</h1>";
    listarPizzas($conn);
    ?>

    <h2>Realizar Pedido</h2>
    <form action="gracias.php" method="POST">
        <label for="pizza">Selecciona una pizza:</label>
        <select name="pizza" id="pizza">
            <?php
            $consulta = $conn->prepare("SELECT nombre FROM pizza");
            $consulta->execute();

            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo "<option value='" . $row["nombre"] . "'>" . $row["nombre"] . "</option>";
            }
            ?>
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" value="1" min="1">

        <br>
        <input type="submit" value="Añadir al Pedido">
    </form>
    <br>
    <form action="index.php" method="POST">
        <input type="submit" value="Cerrar Sesión">
    </form>

</body>

</html>