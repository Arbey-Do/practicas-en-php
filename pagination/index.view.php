<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="container">
        <h1>Articulos</h1>
        <section class="articulos">
            <ul>
                <?php foreach ($articulos as $articulo): ?>
                    <li><?php echo $articulo['id'].'.- '.$articulo['nombre'] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <div class="paginacion">
            <ul>
            <?php if($pagina != 1): ?>
                    <li><a href="?pagina=<?php echo $pagina - 1?>">&laquo;</a></li>
                <?php else: ?>
                    <li class="disabled">&laquo;</li>
                <?php endif;?>

                <?php
                for($i = 1; $i <= $numeroPaginas; $i++ ) {
                        if($pagina === $i) {
                ?>
                            <li class="active"><a href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php } else { ?>
                            <li><a href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }
                }
                ?>

                <?php if($pagina == $numeroPaginas): ?>
					<li class="disabled">&raquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
				<?php endif; ?>
            </ul>
        </div>
    </div>
</body>
</html>