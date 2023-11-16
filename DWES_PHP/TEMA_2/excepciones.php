<?php
//Crear 2 metodos
//1. Permite dividir la variable $num entre $num2
//2. Calcula la raiz cuadrada de $numero


function dividir($num1, $num2)
{
    if ($num2 == 0) {
        throw new Exception("No es posible dividir por cero");
    }
    return $num1 / $num2;
}
function raizCuadrada($numero)
{
    $resultado = sqrt($numero);
    return $resultado;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excepciones</title>
</head>

<body>

    <?php echo "<h1>Inicio del programa</h1>";

    try {
        echo dividir(10, 2);
        echo "<br>";
        echo dividir(10, 0);
        echo "<br>";
        echo dividir(20, 4);
    } catch (Exception $e) {
        echo "Ha ocurrido un error: " . $e->getMessage() . "</br>";
    } finally {
        echo "Siempre se ejecuta el final </br>";
    }
    
    //El finally se ejecuta siempre al final tanto si se ejecuta o no 
    try {
        echo dividir(10, 0);
    } catch (Exception $e) {
        echo "Ha ocurrido un error: " . $e->getMessage() . "</br>";
    } finally {
        echo "Siempre se ejecuta el final </br>";
    }


    //La excepcion de una para la ejecucion
    try {

        echo dividir(60, 4);
    } catch (Exception $e) {
        echo "Ha ocurrido error: " . $e->getMessage() . "</br>";
    }
    
    echo "<br>";

    try {
        echo raizCuadrada(16);
    } catch (Exception $e) {
        echo "Ha ocurrido error: " . $e->getMessage() . "</br>";
    } 


    ?>

</body>

</html>