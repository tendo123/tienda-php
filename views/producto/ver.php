<?php if (isset($pro)): ?>
    <h1><?= $pro->nombre ?></h1>
    <div class="product">
        <div class="img">
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="<?= $pro->nombre ?>"/>
        </div>
        <div class="data">
            <h2><?= $pro->nombre ?></h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Descripcion</td>
                        <td><?= $pro->descripcion ?></td> 

                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td><?= $pro->precio ?></td>
                    </tr>
                </tbody>

            </table>


            <a class="btn btn-success" href="<?= base_url ?>carrito/add&id=<?= $pro->id ?>">Comprar</a>
        </div>

    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>

