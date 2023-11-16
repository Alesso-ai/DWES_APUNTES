<?php
require_once 'Material.php';
require_once 'Libro.php';
require_once 'DVD.php';


$libro1 = new Libro("Harry Potter", "J.K. Rowling", "123456789", 500);
$libro2 = new Libro("El Señor de los Anillos", "J.R.R. Tolkien", "987654321", 1000);

$dvd1 = new DVD("Inception", "Christopher Nolan", "111222333", "2h 28min", "Ciencia ficción");
$dvd2 = new DVD("The Shawshank Redemption", "Frank Darabont", "444555666", "2h 22min", "Drama");


$materiales = [$libro1, $libro2, $dvd1, $dvd2];

echo "<h1>Biblioteca Babel</h1>";
echo "<h2>Libros y DVD antes de ser prestados</h2>";
echo $materiales[0]; 
echo "<br>";
echo $materiales[3]; 

echo "<h2>Prestamos el libro</h2>";
echo $materiales[0]->prestar();
echo "<br>";
echo $materiales[0];

echo "<h2>Prestamos el DVD</h2>";
echo $materiales[3]->prestar();
echo "<br>";
echo $materiales[3];

echo "<h2>Intentamos volver a tomar prestado el mismo DVD</h2>";
echo $materiales[3]->prestar();
echo "<br>";
echo $materiales[3];

echo "<h2>Devolvemos los materiales</h2>";
echo $materiales[0]->devolver();
echo "<br>";
echo $materiales[0];
echo "<br>";
echo $materiales[3]->devolver();
echo "<br>";
echo $materiales[3];

echo "<h2>Intentamos devolver material no prestado</h2>";

echo $materiales[2]->devolver();
echo "<br>";
echo $materiales[2];
?>
