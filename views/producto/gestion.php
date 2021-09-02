<h1>Gestion de productos</h1>

<a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Crear Producto</a>
<br/>
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complet'): ?>
    <strong style="color: green">Producto guardado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complet'): ?>
    <strong style="color: red">Error al crear producto</strong>
<?php endif; ?>
<?php Utilidades::deleteSession('producto') ?>


<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complet'): ?>
    <strong style="color: green">Producto eliminado!!</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complet'): ?>
    <strong style="color: red">Error al eliminar producto</strong>
<?php endif; ?>
<?php Utilidades::deleteSession('delete') ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" name="categoria">
                            <?php $categorias = Utilidades::show_categorias(); ?>
                            <?php while ($cat = $categorias->fetch_object()): ?>
                                <option value="<?= $cat->id ?>"><?= $cat->nombre ?></option>
                            <?php endwhile; ?>
                        </select>     
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese producto">      
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" rows="3" "></textarea>      
                    </div>
                    <div class="form-group col-md-5">                       
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" placeholder="Precio">     
                    </div>
                    <div class="form-group col-md-5">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="Cantidad">      
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control-file" name="imagen">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Guardar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">STOCK</th>
            <th scope="col">ACTUALIZAR</th>
            <th scope="col">ELIMINAR</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($prod = $productos->fetch_object()): ?>
            <tr>
                <td><?= $prod->id ?></td>
                <td><?= $prod->nombre ?></td>
                <td><?= $prod->precio ?></td>
                <td><?= $prod->stock ?></td>
                <!-- Ojo colomamos el & ya que el id es el 3 parametro que nos llega por la URL producto y editar son 2 parametros -->
                <td><a href="<?= base_url ?>producto/editar&id=<?= $prod->id ?>" class="btn btn-info btn-sm">Actualizar</a></td>
                <td><a href="<?= base_url ?>producto/eliminar&id=<?= $prod->id ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
            </tr>
        <?php endwhile; ?>

    </tbody>
</table>




