<?php
    if($_POST["usuario"]=="pepe" and $_POST["clave"]=="12345"){
        header("Location:Bienvenido.html");
    }else{
        header("Location:error.html");
    }
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Usuario introducido: " . $_POST["usuario"] . "</br>";
    echo "clave Introducida: " . $_POST["clave"] . "</br>";
    print_r($_SERVER["REQUEST_METHOD"]);
    echo "</br>";
    print_r($_POST);
    ?>

</body>

</html>