<h1>Lista de categorias</h1>

<a href="<?= base_url ?>categoria/crear" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Crear Categoria</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ACTUALIZAR</th>
            <th scope="col">ELIMINAR</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($cat = $categorias->fetch_object()): ?>
            <tr>
                <td><?= $cat->id ?></td>
                <td><?= $cat->nombre ?></td>
                <td><a href="#" class="btn btn-warning">Actualizar</a></td>
                <td><a href="#" class="btn btn-danger">Eliminar</a></td>
            </tr>
        <?php endwhile; ?>



    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url ?>categoria/save" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese categoria">      
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