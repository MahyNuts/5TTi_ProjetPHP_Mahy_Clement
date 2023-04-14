<?php
    try{
        // $strConnection = ('mysql:host=10.10.51.98;dbname=clement;port=3306');
        // $pdo = new PDO($strConnection, "clement", "root", [
        $strConnection = ('mysql:host=localhost;dbname=clement;port=3306');
        $pdo = new PDO($strConnection, "root", "root", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);  
    } catch (PDOException $e){
        die("Erreur : " . $e->getMessage());
    }
?>