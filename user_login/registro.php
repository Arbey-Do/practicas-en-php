<?php 
    session_start();

    # Si tengo un usuario no debería poder ver el formulario de registro
    if(isset($_SESSION['usuario'])) {
        header('Location: index.php');
        die();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $errores = '';

        if (empty($usuario) OR empty($password) OR empty($password2)) {
            $errores .= '<li>Todos los datos son obligatorios</li>';
        } else {
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=login_practica', 'root', '');
            } catch(PDOException $e) {
                echo "Algo salio mal ".$e->getMessage();
            }

            $statement = $conexion->prepare('SELECT * FROM usuarios WHERE nombre_usuario = :usuario LIMIT 1');
            $statement->execute([':usuario' => $usuario]);
            $resultado = $statement->fetch();

            if($resultado){
                $errores .= '<li>El nombre de usuario ya existe<li>';
            }

            $password = hash('sha512', $password);
            $password2 = hash('sha512', $password2);

            if($password != $password2) {
                $errores .= '<li>Las contraseñas <b>no coinsiden</b></li>';
            }
        }

        if(empty($errores)) {
            $statement = $conexion->prepare('INSERT INTO usuarios (nombre_usuario, pass) VALUES (:nombreUsuario, :pass)');
            $statement->execute([':nombreUsuario' => $usuario, ':pass' => $password]);
            header('Location: login.php');
        }
    }

    require './views/registro.view.php';

?>