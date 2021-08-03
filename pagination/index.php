<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=paginacion', 'root', ''); 
    } catch (PDOException $e) {
        echo "Algo salio mal"."{$e->getMessage()}<br>";
        die();
    }

    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
    $postsPorPagina = 5;

    $primer_articulo = ($pagina > 1) ? ($pagina * $postsPorPagina - $postsPorPagina) : 0;

    $articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT {$primer_articulo}, {$postsPorPagina}");
    $articulos->execute();
    $articulos = $articulos->fetchAll();

    if(!$articulos) {
        header('Location: index.php');
    }

    $totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
    $totalArticulos = $totalArticulos->fetch()['total'];

    $numeroPaginas = ceil($totalArticulos / $postsPorPagina);

    require 'index.view.php';
?>