<!-- Barra lateral -->
<aside id="lateral">

    <div class="block-aside">
        <h4>Mi carrito</h4>
        <ul>
            <?php $stats = Utilidades::statsCarrito(); ?>
            <li><a href="<?= base_url ?>carrito/index"">Productos( <?= $stats['count'] ?> )</a></li>
            <li><a href="<?= base_url ?>carrito/index"">Total : S/. <?= $stats['total'] ?></a></li>
            <li><a href="<?= base_url ?>carrito/index">Ver carrito</a></li>
        </ul>
    </div>


    <div id="login" class="block-aside">
        <?php if (!isset($_SESSION['identity'])): ?>    
            <form action="<?= base_url ?>usuario/login" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">                            
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
        <?php else: ?>
            <h5>Bienvenido(a) <?= $_SESSION['identity']->nombre ?></h5>
        <?php endif; ?>
        <ul>

            <?php if (isset($_SESSION['admin'])): ?>
                <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                <li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>              
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])): ?>   
                <li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="<?= base_url ?>usuario/registro">Registrarse</a></li>  
            <?php endif; ?>
        </ul> 
    </div>
</aside> 

<!-- Contenido Central -->
<div id="central">