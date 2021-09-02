<h1>Registro de Usuario</h1>

<div>
    <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 'completado'): ?>
        <strong style="color: green">Registro completado correctamente</strong>
    <?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'fallido'): ?>
        <strong style="color: red">Fallo en el registro, Introduce bien los datos</strong>
    <?php endif; ?>
    <?php Utilidades::deleteSession('registro'); ?>    
</div>

<form action="<?= base_url ?>usuario/save" method="POST">
    <div class="form-group">
        <label for="nombre">Nombres</label>
        <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombres" autocomplete="off">      
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos"  autocomplete="off">      
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Ingrese email"  autocomplete="off">      
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" placeholder="Ingrese contraseña"  autocomplete="off">      
    </div>
    <input class="btn btn-primary" type="submit" value="REGISTRARSE" />
</form>