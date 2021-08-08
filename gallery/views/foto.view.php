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
            <h1 class="titulo">Foto: <?php if (!empty($photo['titulo'])) {
                echo $photo['titulo'];
            } else {
                echo $photo['imagen'];
            }
                ?>
            </h1>
        </div>
    </header>
    <div class="contenedor">
        <div class="foto">
            <img src="./fotos/<?php echo $photo['imagen'] ?>" alt="">
            <p class="texto"><?php echo $photo['descripcion']?></p>
            <a class="regresar" href="index.php"><i class="fa fa-long-arrow-left"></i> Regresar</a>
        </div>
    </div>
    <footer>
        <p class="copyright">Galeria creada por Arbey-Do</p>
    </footer>
</body>
</html>