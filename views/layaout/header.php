<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/estlos.css?1.5">

        <title>Tienda Virtual</title>
    </head>
    <body>

        <div class="contenedor">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/logo.jpg" alt="logo">
                    <a href="<?= base_url ?>">
                        Tienda Virtual
                    </a>
                </div>

            </header>

            <!-- MENU -->    
            <?php $categorias = Utilidades::show_categorias() ?>    
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?= base_url ?>">Inicio</a>
                    </li>
                    <?php while ($cat = $categorias->fetch_object()): ?>

                        <li>
                            <a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre; ?></a>
                        </li>

                    <?php endwhile; ?>

                </ul>

            </nav>

            <div id="content">
