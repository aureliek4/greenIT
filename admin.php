<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h2>Liste des utilisateurs</h2>
    <table word-spacing="2%">
        <tr>
            <th>Nom</th>
            <th>Transport Principal</th>
            <th>Empreinte Carbone (kg CO₂)</th>
            <th>Actions</th>
        </tr>

        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=empreinte_carbone", "root", "");

        // Récupération des utilisateurs
        $resultat = $pdo->query("SELECT id,nom,transport,empreinte_totale FROM utilisateurs");
        
        //Affichage des utilisateurs avec une boucle while
        while ($user = $resultat->fetch()) {
            echo "<tr>";
            echo "<td>" . $user['nom'] . "</td>";
            echo "<td>" . $user['transport'] . "</td>";
            echo "<td>" . $user['empreinte_totale'] . "</td>";
            echo "<td><a href='admin.php?id=" . $user['id'] . "' onclick='return confirm(\"Voulez-vous vraiment supprimer cet utilisateur ?\")'>Supprimer</a></td>";
             echo "</tr>";
        }
        if (isset($_GET['id'])) {
            $pdo->query("DELETE FROM utilisateurs WHERE id = $id"); // Suppression

        }
        ?>
         <a href="index.php">Retour au formulaire</a>

    </table>
</body>
</html>
