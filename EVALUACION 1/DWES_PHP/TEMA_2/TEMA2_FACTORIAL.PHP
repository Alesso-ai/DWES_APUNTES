<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMA 2</title>
</head>

<body>

    <h1>Ejercicio 2.1</h1>
    <p>Escribe un programa que calcule el factorial de un numero.</br>
        Recuerda que el factorial solo esta definido para numeros enteros mayores o iguales que cero.</p>

    <?php
    function calcularFactorial($n)
    {
        $result = 1;

        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    function factorial_recursivo($n)
    {
        if ($n == 0) {
            return 1;
        } else {


            return $n * factorial_recursivo($n - 1);
        }
    }


    ?>
    <!--Introducimos el numero para hacer el factorial-->
    <?php echo factorial_recursivo(3); ?>




</body>

</html>