<?php
 
function conectarDB(){
    //Conectar a la base de datos con que puerto y usuario y clave
    $cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
    $usuario = "root";
    $clave = "";

    //PDO es objeto de datos donde guardo los datos de usuario , clave etc..
    //variable bd objeto de datos
    try{
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    }catch(PDOException $e){
        echo "Error de conexion a la BD" . $e->getMessage();
    }
}
 

 
//Recibimos nombre y clave, y lo usamos para hacer una consulta a la base de datos
//Nuestra conexion quedaria guardada 
function comprobar_usuario ($nombre, $clave){
    $conn = conectarDB();
    $consulta = $conn->prepare("SELECT usuario, rol FROM USUARIOS WHERE usuario = '$nombre' AND clave = '$clave'");
    $consulta->execute();



    if($consulta -> rowCount() > 0){
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        return array ("nombre"=>$row["usuario"],"rol"=>$row["rol"]);
    }else{
        return FALSE;
    }


    /*
    if($nombre == "usuario" and $clave =="1234"){
        $usu["nombre"] = "usuario";
        $usu["rol"] = 0;
    }elseif($nombre == "admin"and $clave == "1234"){
        $usu["nombre"] = "admin";
        $usu["rol"] = 1;
        return $usu;
    }else return false;
    */
}
 
//comprobar usuario a traves de un get o un post
//get formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usu = comprobar_usuario ($_POST["usuario"], $_POST["clave"]);
        if($usu == FALSE){
            $err = TRUE;
        }else{
           session_start();
           $_SESSION["usuario"] = $_POST ["usuario"];
           header("Location: sesiones1_principal.php");
        }
    }
?>
 
 <!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8">
    <title>DWES Tema 3</title>
</head>
 
<body>
    <?php
 
    if (isset($err)) {
        echo "<p> Revise usuario y contraseña</p>";
    }
    ?>
 
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($usuario)) echo $usuario; ?>" name="usuario" type="text">
 
        <label for="clave">Clave</label>
        <input name="clave" type="password">
        <input type="submit">
    </form>
</body>
 
</html>