<?php

//Funcion que llamaremos al principio del codigo para conectar a la base de datos.
function conectarBD()
{
    $cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
    $usuario = "root";
    $clave = "";

    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (PDOException $e) {
        return "Error conectando a la base de datos: " . $e->getMessage();
    }
}



//Conectar bd
$conn = conectarBD();

//Hacer metodo para leer la tabla de pizzas
function listarPizzas($conn)
{
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

$insertar->execute();


//Modificar pizza
echo "<h1>Modificar Pizza</h1>";

$nombrePizza = "Pizza modificada";
$costePizzas = 6.00;
$precioPizza = 15.00;
$ingredientesPizza = "Tomate, Mozzarella, Champiñones";
$nombreOriginal = "Pizza prueba";

$modificar = $conn->prepare("UPDATE  pizza SET nombre = :nombre,
 coste = :coste, ingredientes = :ingredientes, 
 precio = :precio WHERE nombre = :nombreOriginal");

$modificar->bindParam(':nombre', $nombrePizza);
$modificar->bindParam(':coste', $costePizzas);
$modificar->bindParam(':precio', $precioPizza);
$modificar->bindParam(':ingredientes', $ingredientesPizza);
$modificar->bindParam(':nombreOriginal', $nombreOriginal);

$modificar->execute();

listarPizzas($conn);


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