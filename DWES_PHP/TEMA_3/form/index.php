<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMA 3</title>
</head>

<body>

    <p>
        <?php
        /*GET Y POST PARA DAR Y SOLICITAR INFORMACION
        cuando usamos GET, acepta el paso de parametros por la URL
        */

        if (is_null($_GET["nombre"])) {
            echo "nombre es vacio <br>";
        } else {
            echo "nombre no es vacio <br>";
        }

        if (empty($_GET["apellido"])) {
            echo "apellido es vacio <br>";
        } else {
            echo "apellido no es vacio <br>";
        }


        /*
        empty();
        is_null();
        */




        
        /*echo $_SERVER['REQUEST_METHOD'];
        echo "</br>";
        //echo $_GET["nombre"];
        print_r($_GET);
        echo "</br>";

        echo "Hola " . $_GET["nombre"] . "</br>";

        $edad = $_GET["edad"];
        echo "Tiene " . $edad . "años" . "</br>";

        echo $_GET["direccion"];
        */
        

        ?>

    </p>




</body>

</html>