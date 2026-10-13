<?php

require_once __DIR__ . "/../modelo/Libro.php";
require_once __DIR__ . "/../modelo/LibroDao.php";

class LibroController
{
    private $dao;

    // CONSTRUCTOR
    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    // LISTAR
    public function index()
    {
        $libros = $this->dao->listar();

        require __DIR__ . "/../vista/Libros/index.php";
    }

    // NUEVO
    public function nuevo()
    {
        $libro = new Libro();

        require __DIR__ . "/../vista/Libros/formulario.php";
    }

    // GUARDAR
    public function guardar()
    {
        $libro = new Libro();

        $libro->setTitulo($_POST["titulo"]);
        $libro->setGenero($_POST["genero"]);
        $libro->setAutor($_POST["autor"]);
        $libro->setEditorial($_POST["editorial"]);
        $libro->setFotoportada($_POST["fotoportada"] ?? "");

        $this->dao->insertar($libro);

        header("Location: index.php");
        exit;
    }

    // ACTUALIZAR
    public function actualizar()
    {
        $libro = new Libro(
            $_POST["id"],
            $_POST["titulo"],
            $_POST["genero"],
            $_POST["autor"],
            $_POST["editorial"],
            $_POST["fotoportada"] ?? ""
        );

        $this->dao->actualizar($libro);

        header("Location: index.php");
        exit;
    }

    // EDITAR
    public function editar()
    {
        $id = $_GET["id"] ?? null;
        $libro = $this->dao->buscarPorId($id);

        if ($libro) {
            require __DIR__ . "/../vista/Libros/formulario.php";
        } else {
            header("Location: index.php");
        }
    }

    // ELIMINAR
    public function eliminar()
    {
        $id = $_GET["id"] ?? null;
        if ($id) {
            $this->dao->eliminar($id);
        }

        header("Location: index.php");
        exit;
    }
}