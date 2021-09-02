

<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se a confirmado</h1>
    <p>
        Tu pedido se a guardado con exito una vez realices el pago bancario sera enviado
    </p>
    <h5>Numero de cuenta BBVA : 0011-0814-0213666725</h5>

    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido:</h3>

        <strong>Numero de pedido : <?= $pedido->id ?></strong><br/>
        <strong>Total a pagar : S/.<?= $pedido->coste ?></strong><br/>
        <strong>Productos : </strong> 

        <table class="table" style="text-align: center">
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while ($producto = $productos->fetch_object()): ?>
                <tr>
                    <td><img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="<?= $producto->nombre ?> " style="width: 80px"/></td>
                    <td><?= $producto->nombre ?></td>
                    <td>S/.<?= $producto->precio ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido no se puedo procesar</h1>
<?php endif; ?>
