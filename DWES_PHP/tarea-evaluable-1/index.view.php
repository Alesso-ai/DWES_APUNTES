<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>

<body>

    <h1>Clientes suscritos</h1>
    <ul>
        <?php
        foreach ($listaSubscritos as $cliente) : ?>
            <li>

                <?php echo $cliente['Nombre']; ?>
            </li>

        <?php endforeach; ?>
    </ul>

    <h1>Clientes No suscritos</h1>

    <ul>
        <?php
        foreach ($listaNoSubscritos as $cliente) : ?>
            <li>

                <?php echo $cliente['Nombre']; ?>
            </li>

        <?php endforeach; ?>
    </ul>


    <h1>Clientes con al menos un pedido</h1>
    <ul>
        <?php foreach ($clientesConPedidos as $cliente) : ?>
            <li>

                <?php echo $cliente['Nombre']; ?>
                <?php echo $cliente['Lista de pedidos']['Total'] . "€"; ?>
            </li>
        <?php endforeach; ?>
    </ul>


    <h1>Listado de clientes por importe gastado (decreciente)</h1>
    <ul>
        <?php foreach ($clientesConPedidos as $cliente) : ?>
            <li>
                 <?php echo $cliente['Nombre']; ?>
                 <?php echo $cliente['Lista de pedidos']['Total'] . "€"; ?>
            </li>
        <?php endforeach; ?>
    </ul>



</body>

</html>