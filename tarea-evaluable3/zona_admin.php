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

function listarPizzas($conn)
{
    $consulta = $conn->prepare("SELECT nombre,precio FROM pizza");

    $consulta->execute();


    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . "." . $row["precio"] . "€.<br>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Conecta a la base de datos
    $conn = conectarDB();

    // Recoge los datos del formulario
    $nombre = $_POST["nombre"];
    $coste = $_POST["coste"];
    $precio = $_POST["precio"];
    $ingredientes = $_POST["ingredientes"];

    // Prepara la consulta SQL para insertar una nueva pizza
    $consulta = $conn->prepare("INSERT INTO pizza (nombre, coste, precio, ingredientes) VALUES (:nombre, :coste, :precio, :ingredientes)");

    // Asocia los parámetros
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':coste', $coste);
    $consulta->bindParam(':precio', $precio);
    $consulta->bindParam(':ingredientes', $ingredientes);

    // Ejecuta la consulta
    $consulta->execute();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Admin</title>
</head>

<body>
    <?php
    echo "<h1>Nuestas Pizzas</h1>";
    listarPizzas($conn);
    ?>
    <h1>Personaliza tu Pizza</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="nombre">Nombre de la Pizza:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="coste">Coste:</label>
        <input type="number" step="0.01" id="coste" name="coste" required><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required><br>

        <label for="ingredientes">Ingredientes:</label>
        <textarea id="ingredientes" name="ingredientes" required></textarea><br>

        <input type="submit" value="Crear Pizza">
    </form>
    <label for="pizza">Selecciona una pizza (si deseas modificar):</label>
    <select name="pizza" id="pizza">
        <option value="">Nueva Pizza</option>
        <?php
        $consultaPizzas = $conn->prepare("SELECT id, nombre FROM pizza");
        $consultaPizzas->execute();

        foreach ($consultaPizzas->fetchAll(PDO::FETCH_ASSOC) as $row) {
            echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
        }
        ?>
    </select>

    <h2>Borrar Pizza</h2>
    <form action="borrar_pizza.php" method="POST">
        <label for="pizza_borrar">Selecciona una pizza para borrar:</label>
        <select name="pizza_borrar" id="pizza_borrar">
            <?php
            $consultaPizzas = $conn->prepare("SELECT id, nombre FROM pizza");
            $consultaPizzas->execute();

            foreach ($consultaPizzas->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
            }

            ?>
        </select>
        <input type="submit" value="Borrar Pizza">
    </form>

    <form action="index.php" method="POST">
        <input type="submit" value="Cerrar Sesión">
    </form>

</body>

</html>