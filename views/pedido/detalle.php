<h1>Detalle del pedido</h1>

<?php if (isset($pedido)): ?>
    <?php
    //Verificamos si existe la sesion admin y mostramos un form para editar el estado del pedido
    if (isset($_SESSION['admin'])):
        ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= base_url ?>pedido/estado" method="POST" style="width: 30%">
            <!--Enviamos el id del pedido -->
            <input type="hidden" value="<?= $pedido->id ?>" name="pedido_id"/>
            <div class="form-group">
                <select class="form-control" name="estado">
                    <!-- Mostrar el estado seleccionado -->
                    <option value="confirmar" <?= $pedido->estado == "confirmar" ? 'selected' : '' ?>>Pendiente</option>
                    <option value="proceso" <?= $pedido->estado == "proceso" ? 'selected' : '' ?>>En proceso </option>
                    <option value="listo" <?= $pedido->estado == "listo" ? 'selected' : '' ?>>Listo</option>
                    <option value="enviado" <?= $pedido->estado == "enviado" ? 'selected' : '' ?>>Enviado</option>
                </select>
                <input class="btn btn-primary mt-3 btn-sm" type="submit" value="CAMBIAR"/>
            </div>
        </form>
    <?php endif; ?>

    <h3>Direccion de envio</h3>

    <strong>Provincia: <?= $pedido->provincia ?></strong><br/>
    <strong>Distrito: <?= $pedido->distrito ?></strong><br/>
    <strong>Direccion: <?= $pedido->direccion ?></strong><br/>

    <h3>Datos del pedido</h3>
    <strong>Estado : <?= Utilidades::showStatus($pedido->estado) ?></strong><br/>
    <strong>Numero de pedido : <?= $pedido->id ?></strong><br/>
    <strong>Total a pagar : S/.<?= $pedido->coste ?></strong><br/>
    <strong>Productos : </strong> 

    <table class="table" style="text-align: center">
        <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
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
