<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>

<body>
    <h1>Libros</h1>

    <h2>Por título</h2>
    <?php
    foreach ($nuevaLista as $libro) : ?>
        <li>
            <a href="<?php echo $libro['url']; ?>">
                <?php echo $libro['titulo']; ?>
            </a>
        </li>

    <?php endforeach; ?>


    <h2>Por año</h2>
    <?php
    foreach ($nuevaLista2 as $libro) : ?>
        <li>
            <a href="<?php echo $libro['url']; ?>">
                <?php echo $libro['titulo']; ?>
            </a>
        </li>

    <?php endforeach; ?>





</body>

</html>