<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>APUNTES GENERALES</title>
</head>

<body>
    <h1>
        <?php echo "<h1>APUNTES GENERALES</h1>"; ?>
    </h1>
    <p>
        <?php

        # Esto es un comentario
        /* Esto es un comentario */
        /* Se concatena con el punto $nombre.saludo */
        $saludo = "Bienvenido";
        $nombre = "Pepe";
        echo $saludo . ", " . $nombre;

        # Condiciones
        if (print "hola") {
            echo ", caracola" . "</br>";
        }

        $miEntero1 = 15;
        $miEntero2 = 015;
        $miEntero3 = 0x15;
        echo $miEntero1 . "</br>";
        echo $miEntero2 . "</br>";
        echo $miEntero3 . "</br>";

        /* Otros operadores operacion de asignacion */
        $a = 5;
        $b = $a + 1;
        $c = $a++;
        /* El de c primero suma 1 al de arriba justo que son 6 y le suma 1 */
        $d = ++$a;
        echo " a= " . $a . "</br>";
        echo " b= " . $b . "</br>";
        echo " c= " . $c . "</br>";

        /* Para saber qué tipo de dato usamos */
        $e = "3.1416";
        echo "E es de tipo " . gettype($e);
        settype($b, "float");
        echo "</br>b vale $b y es de tipo " . gettype($b) . "</br>";

        echo "</br>";

        # Array o lista
        $libros = ["World of Warcraft", "The Lord of the Rings", "El italiano", "El Quijote"];
        $libros2 = [
            0 => 'World of Warcraft',
            1 => 'The Lord of the Rings',
            2 => 'El italiano',
            3 => 'El Quijote',
        ];
        var_dump($libros);
        echo "</br>";
        var_dump($libros2);

        ?>

    <ul>
        <?php
        /* Declarando libro como un objeto dentro de libros */
        foreach ($libros as $libro) {
            echo "<li>" . $libro . "</li>";
        }

        ?>
    </ul>

    <ul>

        <?php

        $libros = [
            [
                "titulo" => 'World of Warcraft',
                "autor" => "Blizzard",
                "url" => "www.battle.net",
                "año" => "2004"
            ],
            [
                "titulo" => 'The Lord of the Rings',
                "autor" => "Blizzard",
                "url" => "www.TLOTR.es",
                "año" => "1953"
            ],
            [
                "titulo" => 'El Quijote',
                "autor" => "Cervantes",
                "url" => "www.Cervantes.es",
                "año" => "1604"
            ],
            [
                "titulo" => 'El Italiano',
                "autor" => "Perez Reverte",
                "url" => "www.Reverte.es",
                "año" => "2021"
            ]
        ];

        foreach ($libros as $libro) {
            echo "<li>" . $libro['titulo'] . "</li>";
        }

        echo "</br>";

        foreach ($libros as $libro) {
            echo "<li>" . $libro['url'] . "</li>";
        }

        ?>

    </ul>

    </p>

    <p>
    <ul>
        <?php foreach ($libros as $libro) : ?>
            <li>
                <!-- Forma abreviada de echo -->
                <?= $libro['titulo']; ?>
            </li>
        <?php endforeach; ?>

    </ul>
    <ul>
        <?php foreach ($libros as $libro) : ?>
            <li>
                <a href="<?php echo $libro['url']; ?>">
                    <?php echo $libro['titulo']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    </p>

    <ul>

        <?php foreach ($libros as $libro) : ?>

            <?php if ($libro['año'] === '2021') : ?>

                <li>

                    <?php

                    echo "$libro[titulo] ($libro[año])";

                    ?>

                </li>

            <?php endif; ?>

        <?php endforeach ?>

    </ul>



    <?php
    /*Creamos una funcion para sacar los libros con año 2021*/
    function filtraPorAnio($libros, $autor)
    {
        $librosFiltrados = [];
        foreach ($libros as $libro) {
            if ($libro['autor'] === $autor) {
                $librosFiltrados[] = $libro;
            }
        }
        return $librosFiltrados;
    }
    /*Creamos una variable para guardar los libros con este filtro
    en un array*/
    //$listaNueva = filtraPorAnio($libros);
    //var_dump($listaNueva);
    ?>


    <ul>
        <!--Creamos un bucle pasandole como paramentro la anterior funcion
        y asi solo nos devuelve los libros con dicho filtro-->
        <?php foreach (filtraPorAnio($libros, 'Perez Reverte') as $libro) : ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[año])";
                ?>
            </li>
        <?php endforeach; ?>
    </ul>



    <!--En este caso es crear una funcion para filtrar por año posterior a los 2000-->
    <?php
    function filtrarPorFecha($libros)
    {
        $librosFiltradosAnio = [];
        foreach ($libros as $libro) {
            if ($libro['año'] >= '2000') {
                $librosFiltradosAnio[] = $libro;
            }
        }
        return $librosFiltradosAnio;
    }
    ?>
    <ul>
        <?php foreach (filtrarPorFecha($libros) as $libro) : ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[año])";
                ?>
            </li>
        <?php endforeach; ?>



    </ul>


    <!--Crear una variable que sea una funcion-->
    <?php
    $filtro = function ($libros, $autor) {
        $librosFiltrados = [];
        foreach ($libros as $libro) {
            if ($libro['autor'] === $autor) {
                $librosFiltrados[] = $libro;
            }
        }
        return $librosFiltrados;
    }
    ?>

    <ul>
        <?php foreach ($filtro($libros, 'Cervantes') as $libro) : ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[autor])";
                ?>
            </li>
        <?php endforeach; ?>



    </ul>


    <?php 

            function filtro($item,$fn){
                $filteredItems = [];
                foreach($item as $item){
                    if($fn($item)){
                        $filteredItems[] = $item;

                    }
                }
                return $filteredItems;
            }; 

            $nuevaLista = array_filter($libros, function($libro){
                return $libro['autor']==='Cervantes';
            });
            
    
    ?>








</body>

</html>