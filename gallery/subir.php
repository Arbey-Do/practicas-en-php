<?php 
require './global_functions.php';

$dbconecction = dbConecction('galeria', 'root', '');

if(!$dbconecction) {
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = @getimagesize($_FILES['foto']['tmp_name']);
    if($check) {
        $target_folder = 'fotos/';
        $uploaded_file = "{$target_folder}{$_FILES['foto']['name']}";
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploaded_file);

        $statement = $dbconecction->prepare(
            'INSERT INTO fotos (titulo, imagen, descripcion) VALUES (:title, :image, :text)'
        );

        $statement->execute(['title' => $_POST['titulo'], 'image' => $_FILES['foto']['name'], 'text' => $_POST['texto']]);

        header('Location: index.php');
    } else {
        $error = 'El archivo no es una imagen o es muy pesado';
    }
}

require './views/subir.view.php';
?>