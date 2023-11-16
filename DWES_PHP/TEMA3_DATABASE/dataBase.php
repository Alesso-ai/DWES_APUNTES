<?php
//creamos una variable con una base de datos en php
//Mostrar los datos de la tabla
$cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
$usuario = "root";
$clave = "";

try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);

    echo "Conexion realizada con exito";

    //Seleccionar toda la tabla de usuario
    $sq1 = "SELECT *  FROM usuarios";

    echo "<br/>";

    $usuarios = $bd->query($sq1);
   // $resultados = $usuarios->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    //print_r($resultados);
    echo "</pre>";


    foreach ($usuarios as $row) {
        print "Usuario:" .$row["usuario"];
        print ".ID:" .$row["id"]."<br/>";
        print "ROL:" .$row["rol"]."<br/>";
        print "Correo:" .$row["correo"]."<br/>";
        echo "<br/>";
    }
    

 

} catch (PDOException $e) {
    "Error conectando a la base de datos: " . $e->getMessage();
}
?>