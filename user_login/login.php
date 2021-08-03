<?php
    session_start();

    if(isset($_SESSION['usuario'])) {
        header('Location: index.php');
        die();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password = hash('sha512', $password);
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=login_practica', 'root', '');
        } catch (PDOException $e) {
            echo "Algo salio mal {$e->getMessage()}";
        }

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario AND pass = :password');
        $statement->execute([':nombre_usuario' => $usuario, ':password' => $password]);
        $resultado = $statement->fetch();
        
        if(empty($resultado)) {
            $errores = '<li>El <b>nombre de usuario</b> o la <b>contraseña, no coinciden</b></li>';
        } else {
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        }
        
    }

    require './views/login.view.php';
?>