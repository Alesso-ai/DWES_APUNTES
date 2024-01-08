<?php
require "connection.php";
$pdo = conectarBD();


// Manejo de cookies
$selectedActivity = 'todas las actividades';
if (isset($_COOKIE['lastActivity'])) {
    $selectedActivity = $_COOKIE['lastActivity'];
}
if (isset($_POST['activity'])) {
    $selectedActivity = $_POST['activity'];
    setcookie('lastActivity', $selectedActivity, time() + 86400); // 86400 = 24 horas
}

// Consulta SQL
$sql = "SELECT nombre, email, telefono FROM clientes";
if ($selectedActivity !== 'todas las actividades') {
    $sql .= " WHERE actividad = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$selectedActivity]);
} else {
    $stmt = $pdo->query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Las actividades de nuestros clientes</title>
</head>
<body>

<h1>Las actividades de nuestros clientes</h1>

<form method="post">
    <select name="activity">
        <option value="todas las actividades">Todas las actividades</option>
        <option value="yoga" <?php echo $selectedActivity == 'yoga' ? 'selected' : ''; ?>>Yoga</option>
        <option value="spinning" <?php echo $selectedActivity == 'spinning' ? 'selected' : ''; ?>>Spinning</option>
        <option value="musculación" <?php echo $selectedActivity == 'musculación' ? 'selected' : ''; ?>>Musculación</option>
        <option value="crossfit" <?php echo $selectedActivity == 'crossfit' ? 'selected' : ''; ?>>Crossfit</option>
        <option value="aeróbic" <?php echo $selectedActivity == 'aeróbic' ? 'selected' : ''; ?>>Aeróbic</option>
    </select>
    <input type="submit" value="Buscar">
</form>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
    </tr>
    <?php
    // Comprobando si hay filas devueltas
    if ($stmt->rowCount() > 0) {
        // Mostrar datos de cada fila
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . htmlspecialchars($row["nombre"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td><td>" . htmlspecialchars($row["telefono"]) . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No hay resultados</td></tr>";
    }
    ?>
</table>


</body>
</html>
