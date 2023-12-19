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
    // set cookie
    setcookie('lastActivity', $selectedActivity, time() + 86400);
}

// Consulta SQL
$sql = "SELECT nombre, email, telefono FROM clientes";
if ($selectedActivity != 'todas las actividades') {
    $sql .= " WHERE actividad = :selectedActivity";
    $resu = $pdo->prepare($sql);
    $resu->bindParam(':selectedActivity', $selectedActivity);
    $resu->execute();
} else {
    $resu = $pdo->prepare($sql);
    $resu->execute();
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
        // Imprimir tabla
        $clientes = $resu->fetchAll(PDO::FETCH_ASSOC);
        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td>" . $cliente['nombre'] . "</td>";
            echo "<td>" . $cliente['email'] . "</td>";
            echo "<td>" . $cliente['telefono'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>