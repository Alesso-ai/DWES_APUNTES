<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION["count"])) {
        $_SESSION["count"] = 0;
        $_SESSION["nombre"] = "Pedro";
        $_SESSION["role"] = "Admin";
    }else{
        $_SESSION["count"]++;
    }


    //print_r($_COOKIE);
    //print_r($_SESSION);

    echo "Hola " . $_SESSION["nombre"] . "</br>";
    echo "Contador: ". $_SESSION["count"];

    ?>


</body>

</html>