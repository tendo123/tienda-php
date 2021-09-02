<?php if (isset($categ)): ?>
    <h1><?= $categ->nombre ?></h1>
    <?php if ($productos->num_rows == 0): ?>
        <p>No hay productos para mostar</p>
    <?php else: ?>
        <?php while ($prod = $productos->fetch_object()): ?>
            <div class="producto">
                <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>" style="text-decoration: none; color: #A1683A;">
                    <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="<?= $prod->nombre ?>"/>
                    <h2><?= $prod->nombre ?></h2>
                </a>
                <p><?= $prod->precio ?></p>
                <a class="btn btn-success btn-sm" href="<?= base_url ?>carrito/add&id=<?= $prod->id ?>">Comprar</a>
            </div>
        <?php endwhile; ?>


    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>
