<?php

//Alejandro Ruiz Prieto


$clientes = [
    [
        "Nombre" => 'Joselito',
        "Lista de pedidos" => [

            "Articulos" => 'Mouse',
            "Total" => "100"

        ],
        "Subscripcion" => true

    ],


    [
        "Nombre" => 'Xuan',
        "Lista de pedidos" => [
            
                "Articulos" => 'Keyboard',
                "Total" => "200"
            
        ],
        "Subscripcion" => true

    ],




    [
        "Nombre" => 'Francisco',
        "Lista de pedidos" => [
            
                "Articulos" => 'headset',
                "Total" => "150"
            
        ],
        "Subscripcion" => true
    ],



    [
        "Nombre" => 'Manolo',
        "Lista de pedidos" => [
            
               
            
        ],
        "Subscripcion" => false
    ],



    [
        "Nombre" => 'Jose Luis',
        "Lista de pedidos" => [
            
                
                
            
        ],
        "Subscripcion" => true
    ]
];


$listaSubscritos = array_filter($clientes, function ($cliente) {
    return $cliente['Subscripcion'] === true;
    //echo $cliente["Nombre"];
});

$listaNoSubscritos = array_filter($clientes, function ($cliente) {
    return $cliente['Subscripcion'] === false;
});

$clientesConPedidos = array_filter($clientes, function ($cliente) {
    return !empty($cliente['Lista de pedidos']);
});


usort($clientesConPedidos, function ($a, $b) {
    return $b['Lista de pedidos']['Total'] - $a['Lista de pedidos']['Total'];
});




require "index.view.php";
