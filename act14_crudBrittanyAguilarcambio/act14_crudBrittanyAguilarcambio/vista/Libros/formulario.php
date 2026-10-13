<?php
$editar = $libro->getId() !== null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editar ? "Editar libro" : "Nuevo libro" ?></title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor formulario">

    <h1><?= $editar ? "Editar libro" : "Nuevo libro" ?></h1>

    <form method="POST"
          action="index.php?accion=<?= $editar ? "actualizar" : "guardar" ?>">

        <?php if ($editar): ?>
            <input type="hidden" name="id" value="<?= $libro->getId() ?>">
        <?php endif; ?>

        <label for="titulo">Título:</label>
        <input type="text"
               id="titulo"
               name="titulo"
               required
               value="<?= htmlspecialchars($libro->getTitulo()) ?>">

        <label for="genero">Género:</label>
        <input type="text"
               id="genero"
               name="genero"
               required
               value="<?= htmlspecialchars($libro->getGenero()) ?>">

        <label for="autor">Autor:</label>
        <input type="text"
               id="autor"
               name="autor"
               required
               value="<?= htmlspecialchars($libro->getAutor()) ?>">

        <label for="editorial">Editorial:</label>
        <input type="text"
               id="editorial"
               name="editorial"
               required
               value="<?= htmlspecialchars($libro->getEditorial()) ?>">

        <label for="fotoportada">Foto Portada:</label>
        <input type="text"
               id="fotoportada"
               name="fotoportada"
               value="<?= htmlspecialchars($libro->getFotoportada()) ?>">

        <div class="acciones-formulario">
            <a href="index.php" class="btn btn-cancelar">Cancelar</a>

            <button type="submit" class="btn btn-guardar">
                <?= $editar ? "Actualizar" : "Guardar" ?>
            </button>
        </div>

    </form>
</div>

</body>
</html>