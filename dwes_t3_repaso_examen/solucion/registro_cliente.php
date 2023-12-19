<?php
require "connection.php";
$pdo = conectarBD();

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $actividad = $_POST['actividad'];

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO clientes (nombre, email, telefono, actividad) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Ejecutar la consulta
    $stmt->execute([$nombre, $email, $telefono, $actividad]);

    // Redireccionar a otra página o mostrar un mensaje de éxito
    echo "<p>Cliente registrado con éxito.</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Nuevo Cliente</title>
</head>
<body>

<h1>Registro de Nuevo Cliente</h1>

<form method="post">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>

    <label for="telefono">Teléfono:</label><br>
    <input type="text" id="telefono" name="telefono"><br>

    <label for="actividad">Actividad:</label><br>
    <select id="actividad" name="actividad">
        <option value="yoga">Yoga</option>
        <option value="spinning">Spinning</option>
        <option value="musculación">Musculación</option>
        <option value="crossfit">Crossfit</option>
        <option value="aeróbic">Aeróbic</option>
    </select><br><br>

    <input type="submit" value="Registrar">
</form>

</body>
</html>
