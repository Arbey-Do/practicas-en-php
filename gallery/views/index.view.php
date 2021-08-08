<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/styles.css">
    <title>Galeria</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Galería</h1>
        </div>
    </header>
    <section class="fotos">
        <div class="contenedor">
            <?php foreach($photos as $photo) : ?>
                <div class="thumb">
                    <a href="foto.php?id=<?php echo $photo['id']?>">
                        <img src="fotos/<?php echo $photo['imagen'] ?>" alt="">
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="paginacion">
                <?php if($current_page > 1) : ?>
                    <a class="izquierda" href="index.php?page=<?php echo $current_page - 1; ?>"><i class="fa fa-long-arrow-left"></i> Página Anterior</a>
                <?php endif ?>

                <?php if($total_pages != $current_page) : ?>
                    <a class="derecha" href="index.php?page=<?php echo $current_page + 1; ?>">Pagína Siguiente <i class="fa fa-long-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <footer>
        <p class="copyright">Galeria creada por José Arbey</p>
    </footer>
</body>
</html>