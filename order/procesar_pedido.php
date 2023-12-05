<?php 
require "connection.php" ;
$conn = conectarDB ();

if($S_SERVER["REQUEST_METHOD"] == "POST"){
    $id_cliente =1;
    $fecha_pedido = date("Y-m-d H:i:s");
    $detalle_pedido ="";
    $total = 0;

    for($i = 1; $i <= 4; $i++){
        $juegoID = $_POST ["juego$i"];
        

    }



    $juego1 = $_POST["juego1"];
    $juego2 = $_POST["juego2"];
    $juego3 = $_POST["juego3"];
    $juego4 = $_POST["juego4"];

    $sql = "INSERT INTO pedidos (juego1, juego2, juego3, juego4) VALUES (:juego1, :juego2, :juego3, :juego4)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":juego1", $juego1);
    $stmt->bindParam(":juego2", $juego2);
    $stmt->bindParam(":juego3", $juego3);
    $stmt->bindParam(":juego4", $juego4);
    $stmt->execute();

    
}else{
    header("Location: error.html");
}

?>