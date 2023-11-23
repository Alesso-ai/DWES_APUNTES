<?php

function conectarDB()
{
    // Conectar a la base de datos con el puerto, usuario y clave
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



// Función para listar pizzas, ahora acepta la conexión como parámetro
function listarPizzas($conn)
{
    $consulta = $conn->prepare("SELECT nombre, precio FROM pizza");
    // La ejecutamos
    $consulta->execute();

    // La imprimimos por pantalla
    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . "-->" . $row["precio"] . "€.<br>";
    }
}
echo "<h1>Nuestras Pizzas</h1>";
$conn = conectarDB();
    listarPizzas($conn);

    

?>

