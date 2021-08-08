<?php 
    require './global_functions.php';

    $photos_p_page = 8;

    $current_page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
    $begin = ($current_page > 1) ? ($current_page * $photos_p_page - $photos_p_page) : 0;

    $conecction = dbConecction ('galeria', 'root', '');
    if(!$conecction) {
        die();
    }

    $statement = $conecction->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT {$begin}, {$photos_p_page}");

    $statement->execute();
    $photos = $statement->fetchAll();

    if(empty($photos)) {
        $error = "<p>No hay Fotos para mostrar</p>";
    }

    $statement = $conecction->prepare("SELECT FOUND_ROWS() AS total_rows");
    $statement->execute();
    $total_posts = $statement->fetch()['total_rows'];
    

    $total_pages = ceil($total_posts / $photos_p_page);


    require './views/index.view.php';
    
?>