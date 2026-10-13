<?php

require_once __DIR__ . "/Libro.php";

class LibroDao
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    // === LISTAR LIBROS

    public function listar()
    {
        $sql = "SELECT id, titulo, genero, autor, editorial, fotoportada
                FROM libro
                ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        $libros = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $libro = new Libro(
                $fila["id"],
                $fila["titulo"],
                $fila["genero"],
                $fila["autor"],
                $fila["editorial"],
                $fila["fotoportada"]
            );

            $libros[] = $libro;
        }

        return $libros;
    }


    // ========== BUSCAR POR ID

    public function buscarPorId($id)
    {
        $sql = "SELECT id, titulo, genero, autor, editorial, fotoportada
                FROM libro
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            "id" => $id
        ]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {

            return new Libro(
                $fila["id"],
                $fila["titulo"],
                $fila["genero"],
                $fila["autor"],
                $fila["editorial"],
                $fila["fotoportada"]
            );
        }

        return null;
    }


    // ====== INSERTAR


    public function insertar(Libro $libro)
    {
        $sql = "INSERT INTO libro
                (titulo, genero, autor, editorial, fotoportada)
                VALUES
                (:titulo, :genero, :autor, :editorial, :fotoportada)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "titulo"      => $libro->getTitulo(),
            "genero"      => $libro->getGenero(),
            "autor"       => $libro->getAutor(),
            "editorial"   => $libro->getEditorial(),
            "fotoportada" => $libro->getFotoportada()
        ]);
    }


    // === ACTUALIZAR
  

    public function actualizar(Libro $libro)
    {
        $sql = "UPDATE libro
                SET titulo = :titulo,
                    genero = :genero,
                    autor = :autor,
                    editorial = :editorial,
                    fotoportada = :fotoportada
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id"          => $libro->getId(),
            "titulo"      => $libro->getTitulo(),
            "genero"      => $libro->getGenero(),
            "autor"       => $libro->getAutor(),
            "editorial"   => $libro->getEditorial(),
            "fotoportada" => $libro->getFotoportada()
        ]);
    }


    // ======== ELIMINAR
 

    public function eliminar($id)
    {
        $sql = "DELETE FROM libro
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id" => $id
        ]);
    }
}