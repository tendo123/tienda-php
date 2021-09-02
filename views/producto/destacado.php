<h1>Nuestros productos</h1>

<?php while ($prod = $productos->fetch_object()): ?>
    <div class="producto">
        <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>" style="text-decoration: none; color: #A1683A;">
            <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="<?= $prod->nombre ?>"/>
            <h2><?= $prod->nombre ?></h2>
        </a>
        <p><?= $prod->precio ?></p>
        <a class="btn btn-success btn-sm" href="<?=base_url?>carrito/add&id=<?=$prod->id?>">Comprar</a>
    </div>
<?php endwhile; ?>

