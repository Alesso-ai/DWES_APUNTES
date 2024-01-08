<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contador de visitas</title>
</head>
<body>
    <?php
        $visitas = isset($_COOKIE["visitas"]) ? $_COOKIE["visitas"] + 1 : 1;
        setcookie("visitas", $visitas, time() + 3600 * 26);
 
        echo "Numero de visitas: " . $visitas;
        echo "<br>";
    ?>
 
    <form method="post">
        <button type="submit" name="borrarCookies">Borrar cookies</button>
    </form>
 
    <?php
        if (isset($_POST["borrarCookies"])) {
            setcookie("visitas", "", time() - 3600);
            // También puedes usar unset($_COOKIE["visitas"]); pero la versión con setcookie es más común.
            header("Refresh:0"); // Recargar la página para reflejar el cambio en las cookies
        }
    ?>
</body>
</html>