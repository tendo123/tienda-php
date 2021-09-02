<?php if (isset($_SESSION['identity'])): ?>
    <h1>Realizar pedido</h1>
    <p>
        <a class="alert-info" href="<?= base_url ?>carrito/index">Ver productos y precios</a>
    </p>

    <h3>Direccion de envio</h3>
    <form action="<?= base_url ?>pedido/add" method="POST">
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" name="provincia" placeholder="Ingrese provincia">
        </div>
        <div class="form-group">
            <label for="distrito">Distrito</label>
            <input type="text" class="form-control" name="distrito" placeholder="Ingrese distrito">
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" placeholder="Ingrese direccion">
        </div>
        <input class="btn btn-success" type="submit" value="Confirmar pedido"/>
    </form>


<?php else: ?>
    <p class="alert-warning">Debes iniciar sesion</p>
<?php endif; ?>
