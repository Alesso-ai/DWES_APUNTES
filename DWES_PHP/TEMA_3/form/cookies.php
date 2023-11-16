<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>

<body>

    <?php
    if (!isset($_COOKIE["visitas"])) {
        $visitas = 1;
    } else {
        $visitas = $_COOKIE["visitas"];
        $visitas++;
    }
    setcookie("visitas", $visitas, time() + 3600 * 24);
    echo "Numero de visitas: " . $_COOKIE["visitas"];
    echo "</br>"

    ?>


</body>

</html>