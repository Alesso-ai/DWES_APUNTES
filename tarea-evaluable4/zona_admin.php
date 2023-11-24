<?php

function conectarDB(){
    $cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
    $usuario = "root";
    $clave = "";

    // Variable $bd es un objeto PDO que contiene la conexión
    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (PDOException $e) {
        echo "Error de conexión a la BD" . $e->getMessage();
    }
}
$conn = conectarDB();

function listarPizzas($conn){
    $consulta = $conn->prepare("SELECT nombre,precio FROM pizza");
    //la ejecutamos
    $consulta->execute();

    //La imprimimos por pantalla
    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . "." . $row["precio"] . "€.<br>";
    }
}
echo "<h1>Nuestas Pizzas</h1>";
listarPizzas($conn);



//INSERTAR NUEVA PIZA
echo "<h1>Nuestas Pizzas</h1>";
listarPizzas($conn);
$nombrePizza = "Pizza prueba";
$costePizzas = 5.00;
$precioPizza = 10.00;
$ingredientesPizza = "Tomate, Mozzarella, albahaca, Jamon, Parmesano";

$insertar = $conn->prepare("INSERT INTO pizza (nombre, coste, precio, ingredientes) VALUES ('$nombrePizza', '$costePizzas', '$precioPizza', '$ingredientesPizza')");

$insertar->bindParam(':nombre', $nombrePizza);
$insertar->bindParam(':coste', $costePizzas);
$insertar->bindParam(':precio', $precioPizza);
$insertar->bindParam(':ingredientes', $ingredientesPizza);

$nombrePizza = "Pizza prueba";
$costePizzas = 5.00;
$precioPizza = 10.00;
$ingredientesPizza = "Tomate, Mozzarella, albahaca, Jamon, Parmesano";

$insertar = $conn->prepare("INSERT INTO pizza (nombre, coste, precio, ingredientes) VALUES ('$nombrePizza', '$costePizzas', '$precioPizza', '$ingredientesPizza')");

//$insertar->execute();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pizza</title>
</head>

<body>
    <h1>Personaliza tu Pizza</h1>
    <form action="procesar_pizza.php" method="post">
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
</body>

</html>