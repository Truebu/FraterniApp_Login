<?php
    require 'DateBase.php';
    function search($email){
        require 'DateBase.php';
        $records = $conn -> prepare('SELECT usuarioId,usuarioNombre,usuarioEmail,usuarioTelefonoPrincipal,usuarioContraseña,fk_universidadId FROM usuario WHERE usuarioEmail=:email');
        $records->bindParam(':email', $email);
        $records->execute();
        $results=$records->fetchAll(\PDO::FETCH_ASSOC);
        $filas=count($results);
        return $filas;
    }
?>