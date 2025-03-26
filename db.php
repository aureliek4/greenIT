<?php

    $servername = 'localhost';
    $user = 'root';
    $password = ''; 
    $dbname = 'empreinte_carbone'; 
    
    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname",$user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        echo "Connexion réussie !"; 
        }
    
        catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
        }
    
    ?>