
<?php if (isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "producto/save&id=" . $pro->id ?>
<?php endif; ?>

<form style="width: 600px" action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select class="form-control" name="categoria" >
            <?php $categorias = Utilidades::show_categorias(); ?>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>     
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">      
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea class="form-control" name="descripcion" rows="3" "><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>      
    </div>
    <div class="form-group col-md-5">                       
        <label for="precio">Precio</label>
        <input type="text" class="form-control" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">     
    </div>
    <div class="form-group col-md-5">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">      
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" class="img-form"/>
        <?php endif; ?>
        <input type="file" class="form-control-file" name="imagen">
    </div>
    <div class="modal-footer">

        <input class="btn btn-primary" type="submit" value="Guardar" />
    </div>
</form>




