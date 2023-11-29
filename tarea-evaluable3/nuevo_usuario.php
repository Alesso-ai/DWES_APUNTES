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

//Metodo para comprobar si existe dicho usuario
function usuarioExiste($conn, $usuario)
{
    $consulta = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = :usuario");
    $consulta->bindParam(':usuario', $usuario);
    $consulta->execute();
    $resultado = $consulta->fetchColumn();
    return $resultado > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta a la base de datos
    $conn = conectarDB();

    // Recoge los datos del formulario
    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $correo = $_POST["correo"];
    $rol = 2;

    // Verificar si el usuario ya existe
    if (usuarioExiste($conn, $usuario)) {
        echo "El nombre de usuario ya existe. Por favor, elija otro.";
    } else {
        // Insertar nuevo usuario
        $consulta = $conn->prepare("INSERT INTO usuarios (usuario, nombre, clave, correo,rol) VALUES (:usuario, :nombre, :clave, :correo, :rol)");

        // Asocia los parámetros
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':clave', $clave);
        $consulta->bindParam(':correo', $correo);
        $consulta->bindParam(':rol', $rol);

        // Ejecuta la consulta
        try {
            $consulta->execute();
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            $_SESSION['nombre'] = $nombre;
            header('Location: pedido.php');
        } catch (PDOException $e) {
            echo "Error al crear el usuario: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pizza</title>
    <link rel="stylesheet" href="../tarea-evaluable3/styles/nuevo_usuario.css">

</head>

<body>
    <h1>Registro de Usuario</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="clave">Clave:</label>
        <input type="password" name="clave" required><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required></input><br>

        <br>
        <input type="submit" value="Crear Usuario"></input>
    </form>
</body>

</html>