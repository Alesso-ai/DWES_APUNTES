<?php

class Libro extends Material
{
    private $numPaginas;

    // Constructor de la clase Libro
    public function __construct($titulo, $autor, $ISBN, $numPaginas, $disponible = true)
    {
        parent::__construct($titulo, $autor, $ISBN, $disponible);
        $this->numPaginas = $numPaginas;
    }

    // Getter y Setter de numPaginas
    public function getNumPaginas()
    {
        return $this->numPaginas;
    }

    public function setNumPaginas($numPaginas)
    {
        $this->numPaginas = $numPaginas;
    }

    // Método __toString para la clase Libro
    public function __toString()
    {
        $estado = $this->isDisponible() ? 'Disponible' : 'En préstamo';
        return "Tipo: Libro\nTítulo: {$this->getTitulo()}\nAutor: {$this->getAutor()}\nISBN: {$this->getISBN()}\nNúmero de Páginas: {$this->numPaginas}\nEstado: $estado";
    }
}
