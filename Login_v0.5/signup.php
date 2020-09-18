<?php
    include("methods.php");
    require 'DateBase.php';
    $message='';
    if(!empty($_POST['Nombre'])&&!empty($_POST['email'])&&!empty($_POST['Telefono'])
        &&!empty($_POST['Universidad'])&&!empty($_POST['password'])&&!empty($_POST['Confirm_password'])){
            if($_POST['password']==$_POST['Confirm_password']){
                $records = search($_POST['email']);
                if($records == 0){
                    $sql = "INSERT INTO usuario (usuarioNombre,usuarioEmail,usuarioTelefonoPrincipal,usuarioContraseña,fk_universidadId) 
                    VALUES (:Nombre,:email,:Telefono,:password,:Universidad)" ;
                    $stmt = $conn ->prepare($sql);
                    $stmt->bindParam(':Nombre',$_POST['Nombre']);
                    $stmt->bindParam(':email',$_POST['email']);
                    $stmt->bindParam(':Telefono',$_POST['Telefono']);
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $stmt->bindParam(':password',$password);
                    $stmt->bindParam(':Universidad',$_POST['Universidad']);
                    if($stmt->execute()){
                        $message = 'Registro correcto';
                    }else{
                        print_r($stmt->errorInfo());
                        $message = 'Hubo un error a la hora de crear el usuario';
                    }
                }else{
                    $message = 'El correo ya está en uso';
                }
            }else{
                $message = 'La contraseña debe ser igual para los dos casos';
            }
    }else{
        $message = 'Tiene que llenar todos los campos';
    }
?>
<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assests\css\style.css"> 
    </head>
    <body>
        <?php require 'partials/header.php'?>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <h1>Registro</h1>
        <span> o <a href="login.php"> Ingresar </a></spam>
        <form action = "signup.php" method = "post">
            <input class="input-login" type = "text" name = "Nombre" placeholder = "Pepito Perez">
            <input class="input-login" type = "email" name = "email" placeholder = "ejemplo@ejemplo.com">
            <input class="input-login" type = "text" name = "Telefono" placeholder = "Telefono 312345678">
            <input class="input-login" type = "text" name = "Universidad" placeholder = "UMB ">
            <input class="input-login" type = "password" name = "password" placeholder = "Contraseña">
            <input class="input-login" type = "password" name = "Confirm_password" placeholder = "Confirmar contraseña">
            <input class="input-pass" type = "submit" value = "Registrar">
        </form>
    </body> 
</html>