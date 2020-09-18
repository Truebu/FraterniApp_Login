<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'fraterniApp0_1';

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database;" ,$username,$password);
    }catch(PDOException $e){
        die('Conexion fallida: ' .$e->getMessage());
    }

?>
