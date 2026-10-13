<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Librería</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor">

    <div class="encabezado">
        <h1>Gestión de Librería</h1>
        <button type="button" class="btn btn-nuevo" onclick="abrirModal()">
            + Nuevo libro
        </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Foto Portada</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($libros)): ?>
                <tr>
                    <td colspan="7" class="sin-productos">
                        No existen libros registrados.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($Libros as $Libro): ?>
                    <tr>
                        <td><?= $Libro->getId() ?></td>
                        <td>
                            <?= htmlspecialchars($Libro->getTitulo()) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($Libro->getGenero()) ?>
                        </td>
                        <td> <?= htmlspecialchars($Libro->getAutor()) ?> </td>
                        <td>
                            <?= htmlspecialchars($Libro->getEditorial()) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($Libro->getFotoportada()) ?>
                        </td>
                        <td>
                            <a href="index.php?accion=editar&id=<?= $Libro->getId() ?>"
                               class="btn btn-editar">
                                Editar
                            </a>
                            <a href="index.php?accion=eliminar&id=<?= $Libro->getId() ?>"
                               class="btn btn-eliminar"
                               onclick="return confirm('¿Está seguro de eliminar este libro?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="modalLibro" class="modal">

    <div class="modal-contenido">

        <div class="modal-encabezado">
            <h2>Nuevo libro</h2>
            <button type="button" class="cerrar" onclick="cerrarModal()">&times;</button>
        </div>
        <form method="POST" action="index.php?accion=guardar">

            <label for="titulo">Título:</label>
            <input type="text"
                   id="titulo"
                   name="titulo"
                   required
                   placeholder="Ingrese el título del libro">

            <label for="genero">Género:</label>
            <input type="text"
                   id="genero"
                   name="genero"
                   required
                   placeholder="Ingrese el género literario">

            <label for="autor">Autor:</label>
            <input type="text"
                   id="autor"
                   name="autor"
                   required
                   placeholder="Ingrese el autor del libro">

            <label for="editorial">Editorial:</label>
            <input type="text"
                   id="editorial"
                   name="editorial"
                   required
                   placeholder="Ingrese la editorial">

            <label for="fotoportada">Foto Portada:</label>
            <input type="text"
                   id="fotoportada"
                   name="fotoportada"
                   placeholder="Ingrese la URL o nombre del archivo de imagen">

            <div class="acciones-formulario">
                <button type="button" class="btn btn-cancelar" onclick="cerrarModal()">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-guardar">
                    Guardar libro
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>