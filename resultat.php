<?php
include 'db.php';

if(isset($_GET['id'])){
    $id= $_GET['id'];
 }
 $recup = $pdo->prepare("SELECT * FROM utilisateurs WHERE id=:id");
 $recup->bindValue(':id', $id, PDO::PARAM_INT);
 $recup->execute();
 $result = $recup->fetchAll(PDO::FETCH_ASSOC);
 if(!empty($result)){
    echo"<div style='text-align: center; font-weight: bold;'>L'utilisateur avec l'ID $id existe bien.</div>";


 } else{
    echo "<div style='text-align: center; font-weight: bold;'> L'utilisateur avec l'ID $id ne figure pas dans notre base de donées. veuillez entrez un id valide. </div>";
 }
 $recup=null;

?> 
