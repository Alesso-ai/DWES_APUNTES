<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["usuario"] == "pepe" and $_POST["clave"] == "12345") {
        header("Location:Bienvenido.html");
    } else {
        $usuario = $_POST["usuario"];
        $err = true;
    }
}
?>





<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>

    <?php
    if (isset($err)) {
        echo "<p>Revisa el usuario y la contraseña</p>";
    }

    ?>


    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="POST">
        <input value = "<?php if (isset($usuario)) echo $usuario ?>" name="usuario" type="text">
        <input name="clave" type="password">
        <input type="submit">
    </form>



</body>

</html>