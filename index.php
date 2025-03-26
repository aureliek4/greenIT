<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul de l'Empreinte Carbone</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("db.php");?>
    <div class="container">
        <h1>Estimez votre empreinte carbone</h1>
        <p>Remplissez ce formulaire pour voir l'impact de vos habitudes sur l'environnement.</p>

        
        <form action="traitement.php" method="POST">
            <label> Votre Nom :</label>
            <input type="name" id="nom" name ="nom">
            <label>🚗 Mode de transport principal :</label>
            <select name="transport">
                <option value="voiture">Voiture</option>
                <option value="avion">Avion</option>
                <option value="bus">Bus</option>
                <option value="vélo">Vélo</option>
                <option value="marche">Marche</option>
            </select>

            <label>🥩 Nombre de repas contenant de la viande par semaine :</label>
            <input type="number" name="viande" min="0" required>

            <label>🔌 Consommation d’électricité (kWh/mois) :</label>
            <input type="number" name="electricite" min="0" required>

            <button type="submit">Calculer mon empreinte carbone</button>
        </form>

        <div class="progress-container">
            <div class="progress-bar" id="progress"></div>
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>
