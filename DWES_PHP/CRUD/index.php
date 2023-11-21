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

$insertar = $conn -> prepare("INSERT INTO pizza (nombre, coste, precio, ingredientes) VALUES ('$nombrePizza', '$costePizzas', '$precioPizza', '$ingredientesPizza')");

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



//Metodo para borrar ciertas pizzas
echo "<h1>BORRAR PIZZA MODIFICADA</h1>";

$nombreBorrar = "Pizza Modificada";
$eliminar = $conn->prepare("DELETE FROM pizza WHERE nombre = :nombre ");
$eliminar ->bindParam(':nombre', $nombreBorrar);
$eliminar -> execute();

echo "<h2>Pizzas tras borrar</h2>";

listarPizzas($conn);


//Metodo para filtrar por campo precio

echo "<h1>Filtro por precio de 10€</h1>";

function pizzaPrecio($conn, $precioFiltro){
    $consulta = $conn->prepare("SELECT nombre,precio FROM pizza WHERE precio = :precio");
    
    //Bindeamos el parametro
    $consulta ->bindParam(':precio', $precioFiltro);

    //la ejecutamos
    $consulta->execute();

    //La imprimimos por pantalla
    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . "." . $row["precio"] . "€.<br>";
    }
};
echo "<h2>Pizzas con precio igual a 10.00 euros</h2>";
pizzaPrecio($conn, 10.00);

?>
