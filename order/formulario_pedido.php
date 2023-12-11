<?php
require_once "connection.php";
$conn = conectarDB();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>

<body>
    <h1>Realizar Pedidos</h1>
    <form action="procesar_pedido.php" method="POST"> <!-- Agregado atributo method -->
        <?php for ($i = 1; $i <= 4; $i++) : ?>
            <label for="juego<?= $i ?>"> Juego
                <select name="juego<?= $i ?>" id="juego<?= $i ?>">
                    <option value="0">--Selecciona un juego--</option>
                    <?php
                    $sql = "SELECT id, nombre  FROM juegos";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    foreach ($stmt as $row) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>"; // Eliminada comilla simple adicional
                    }
                    ?>
                </select> <!-- Agregada etiqueta de cierre para el elemento select -->
            </label> <!-- Agregada etiqueta de cierre para el elemento label -->
        <?php endfor; ?>
        <input type="submit" value="Hacer pedido"> 
    </form>
</body>

</html>