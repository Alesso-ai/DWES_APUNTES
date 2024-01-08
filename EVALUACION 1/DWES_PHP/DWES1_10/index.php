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

$nuevaLista = array_filter($libros, function($libro){
    return $libro['autor']==='Cervantes';
});

$nuevaLista2 = array_filter($libros, function($libro){
    return $libro['año']>1950;
});

require "index.view.php";

?>