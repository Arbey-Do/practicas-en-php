<?php 
    function dbConecction (string $dbName, string $user, string $pass) {
        try {
            $connection = new PDO("mysql:host=127.0.0.1;dbname={$dbName}", $user, $pass);
            return $connection;
        } catch(PDOException $e) {
            echo "Fallo la conexion a la base de datos: {$e->getMessage()}";
            return false;
        }
    }
?>