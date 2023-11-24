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

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$conn = conectarDB();

// Verifica el rol del usuario
if ($_SESSION['rol'] == '1') {
    echo "<p>Bienvenido, {$_SESSION['usuario']} Admin.</p>";
    // Resto del código para administradores
} else {
    echo "<p>Bienvenido, {$_SESSION['usuario']}  NPC</p>";
    // Resto del código para usuarios regulares
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

