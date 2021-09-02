<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/estlos.css?1.0">

        <title>Tienda Virtual</title>
    </head>
    <body>

        <div class="contenedor">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/logo.jpg" alt="logo">
                    <a href="index.php">
                        Tienda Virtual
                    </a>
                </div>

            </header>

            <!-- MENU -->    

            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Categoria 1</a>
                    </li>
                    <li>
                        <a href="#">Categoria 2</a>
                    </li>
                    <li>
                        <a href="#">Categoria 3</a>
                    </li>
                </ul>

            </nav>

            <div id="content">

                <!-- Barra lateral -->
                <aside id="lateral">
                    <div id="login" class="block-aside">

                        <form>
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

                        <ul>
                            <li><a href="#">Mis pedidos</a></li>
                            <li><a href="#">Gestionar pedidos</a></li>
                            <li><a href="#">Gestionar categorias</a></li>
                        </ul> 
                    </div>
                </aside> 

                <!-- Contenido Central -->
                <div id="central">
                    <h1>Productos destacados</h1>
                    <div class="producto">
                        <img src="assets/img/coca.png" alt="coca cola"/>
                        <h2>Coca cola 500ml</h2>
                        <p>S/2.50</p>
                        <a class="btn btn-success btn-sm" href="#">Comprar</a>
                    </div>
                    <div class="producto">
                        <img src="assets/img/coca.png" alt="coca cola"/>
                        <h2>Coca cola 500ml</h2>
                        <p>S/2.50</p>
                        <a class="btn btn-success btn-sm" href="#">Comprar</a>
                    </div>
                    <div class="producto">
                        <img src="assets/img/coca.png" alt="coca cola"/>
                        <h2>Coca cola 500ml</h2>
                        <p>S/2.50</p>
                        <a class="btn btn-success btn-sm" href="#">Comprar</a>
                    </div>
                </div>

            </div>  

            <!--Pie de pagina -->
            <footer id="footer">
                <p>Desarrollado por Fernando Valencia &copy;<?= date('Y') ?></p>
            </footer>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>