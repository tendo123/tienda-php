<h1>Carrito de compra</h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table class="table">
        <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php
        foreach ($carrito as $indice => $elemento):
            //guardamos el objeto en una variable
            $producto = $elemento['producto'];
            ?>
            <tr>
                <td><img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="<?= $producto->nombre ?> " style="width: 80px"/></td>
                <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                <td>S/.<?= $producto->precio ?></td>
                <td><a href="<?= base_url ?>carrito/down&indice=<?= $indice ?>" style="color: white" class="btn btn-dark btn-sm mr-2">-</a><?= $elemento['unidades'] ?><a href="<?= base_url ?>carrito/up&indice=<?= $indice ?>" style="color: white" class="btn btn-dark btn-sm ml-2">+</a></td>

                <td><a href="<?= base_url ?>carrito/remove&indice=<?= $indice ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
            </tr>

        <?php endforeach; ?>
    </table>

    <a href="<?= base_url ?>carrito/deleteAll" class="btn btn-danger mt-1">Eliminar Productos</a>
    <?php $stats = Utilidades::statsCarrito(); ?>
    <a href="<?= base_url ?>pedido/hacer" class="btn btn-success float-right" style="margin-right: 35px">Realizar pedido</a>
    <h3 class="float-right" style="margin-right: 50px">Total: S/.<?= $stats['total'] ?></h3>
<?php else: ?>
    <h3>No hay productos en el carrito</h3>
<?php endif; ?>