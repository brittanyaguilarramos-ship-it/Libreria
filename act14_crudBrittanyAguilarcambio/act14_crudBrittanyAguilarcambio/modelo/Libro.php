<?php

class Libro
{
    private $id;
    private $titulo;
    private $genero;
    private $autor;
    private $editorial;
    private $fotoportada;

    // ============================================
    // CONSTRUCTOR
    // ============================================

    public function __construct(
        $id = null,
        $titulo = "",
        $genero = "",
        $autor = "",
        $editorial = "",
        $fotoportada = ""
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->fotoportada = $fotoportada;
    }

    // ============================================
    // GETTERS
    // ============================================

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function getFotoportada()
    {
        return $this->fotoportada;
    }

    // ============================================
    // SETTERS
    // ============================================

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    public function setFotoportada($fotoportada)
    {
        $this->fotoportada = $fotoportada;
    }
}