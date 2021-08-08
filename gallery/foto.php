<?php 

    require 'global_functions.php';

    $conecction = dbConecction ('galeria', 'root', '');
    if (!$conecction) {
        die();
    }

    $id = isset($_GET['id']) ? (int)$_GET['id'] : false;

    if(!$id) {
        header('Location: index.php');
    }

    $statement = $conecction->prepare('SELECT * FROM fotos WHERE id = :id');
    $statement->execute(['id' => $id]);

    $photo = $statement->fetch();

    if(!$photo) {
        header('Location: index.php');
    }

    require './views/foto.view.php';
?>