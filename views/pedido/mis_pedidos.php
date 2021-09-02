<?php if (isset($gestion)): ?>
    <h1>Gestionar Pedidos</h1>
<?php else: ?>
    <h1>Mis Pedidos</h1>
<?php endif; ?>


<table class="table table-bordered">
    <thead class="thead-dark">
    <th>N° Pedido</th>
    <th>Coste</th>
    <th>Fecha</th>
    <th>Estado</th>
</thead>
<?php while ($pedido = $pedidos->fetch_object()): ?>
    <tbody>
        <tr>
            <td><a href="<?= base_url ?>pedido/detalle&id=<?= $pedido->id ?>"><?= $pedido->id ?></a></td>
            <td>S/. <?= $pedido->coste ?></td>
            <td><?= $pedido->fecha ?></td>
            <td><?= Utilidades::showStatus($pedido->estado) ?></td>
        </tr>
    </tbody>


<?php endwhile; ?>

</table>