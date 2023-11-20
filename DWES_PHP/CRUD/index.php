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



//iNSERTAR NUEVA PIIZA


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

$insertar = $conn -> prepare("INSERT INTO pizza (nombre, coste, precio, ingredientes) VALUES ('$nombrePizza', '$costePizzas', '$precioPizza', '$ingredientesPizza')");

$insertar->execute();








?>
