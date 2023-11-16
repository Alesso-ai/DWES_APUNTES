<?php

class DVD extends Material {
    private $duracion;
    private $genero;

    // Constructor de la clase DVD
    public function __construct($titulo, $autor, $ISBN, $duracion, $genero, $disponible = true) {
        parent::__construct($titulo, $autor, $ISBN, $disponible);
        $this->duracion = $duracion;
        $this->genero = $genero;
    }

    // Getters y Setters de duracion y genero
    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    // Método __toString para la clase DVD
    public function __toString() {
        $estado = $this->isDisponible() ? 'Disponible' : 'En préstamo';
        return "Tipo: DVD\nTítulo: {$this->getTitulo()}\nAutor: {$this->getAutor()}\nISBN: {$this->getISBN()}\nDuración: {$this->duracion} minutos\nGénero: {$this->genero}\nEstado: $estado";
    }
}


?>
