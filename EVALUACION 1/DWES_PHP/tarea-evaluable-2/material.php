<?php

class Material {
    private $titulo;
    private $autor;
    private $ISBN;
    private $disponible;

    // Constructor
    public function __construct($titulo, $autor, $ISBN, $disponible = true) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ISBN = $ISBN;
        $this->disponible = $disponible;
    }

    // Getters y Setters
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function isDisponible() {
        return $this->disponible;
    }

    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }

    // Método prestar
    public function prestar() {
        if ($this->disponible) {
            $this->disponible = false;
            return "El material '{$this->titulo}' ha sido prestado.";
        } else {
            return "El material '{$this->titulo}' no se ha podido prestar porque ya está en préstamo.";
        }
    }

    // Método devolver
    public function devolver() {
        if (!$this->disponible) {
            $this->disponible = true;
            return "El material '{$this->titulo}' ha sido devuelto correctamente.";
        } else {
            return "El material '{$this->titulo}' no se ha podido devolver porque no estaba en préstamo.";
        }
    }

    // Método __toString
    public function __toString() {
        $estado = $this->disponible ? 'Disponible' : 'En préstamo';
        return "Título: {$this->titulo}\nAutor: {$this->autor}\nISBN: {$this->ISBN}\nEstado: $estado";
    }
}


?>
