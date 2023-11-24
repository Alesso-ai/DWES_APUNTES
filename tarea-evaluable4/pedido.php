<?php

function conectarDB(){
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
function listarPizzas($conn){
    $consulta = $conn->prepare("SELECT nombre, precio FROM pizza");
    // La ejecutamos
    $consulta->execute();

    // La imprimimos por pantalla
    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . "-->" . $row["precio"] . "€.<br>";
    }
}

$conn = conectarDB();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>

<body>
    <?php
                session_start();
                if(isset($_SESSION["nombre"])){
                    echo "<h2>Bienvenido " .$_SESSION["nombre"]."</h2>";
                }
                echo "<h1>Nuestras Pizzas</h1>";
                listarPizzas($conn);
    ?>
                
</body>

</html>