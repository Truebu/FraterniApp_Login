<?php
    session_start();
    require 'DateBase.php';
    if(isset($_SESSION['user_id'])){
        $records =$conn->prepare('SELECT usuarioId,usuarioNombre,usuarioEmail,usuarioTelefonoPrincipal,usuarioContraseña,fk_universidadId FROM usuario WHERE usuarioId=:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        $user = null;
        if(count($results)>0){
            $user =$results;

        }
    }
?>

<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="UTF-8">
        <title>FrateniApp</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assests\css\style.css"> 
    </head>
    <body>
        <?php require 'partials/header.php'?>
        <?php if(!empty($user)):?>
            <br> Bienvenido. <?= $user[0]['usuarioEmail']?>
            <br> Ingresaste correctamente
            <a href="logout.php">Salir</a>
        <?php else:?>
            <h1>Ingresa o registrate</h1>
            <a class= "a-body" href="login.php"> Ingresar</a> o
            <a class= "a-body" href="signup.php"> Registrar </a>
        <?php endif;?>
    </body>
</html>