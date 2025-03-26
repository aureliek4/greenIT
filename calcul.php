<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transport = $_POST['transport'];
    $viande = intval($_POST['viande']);
    $electricite = intval($_POST['electricite']);
    $nom    = $_POST['nom'];
    // Facteurs d’émission en kg CO₂
    $facteurs = [
        "voiture" => 2.4,
        "avion" => 15.0,
        "bus" => 0.8,
        "vélo" => 0.0,
        "marche" => 0.0,
        "viande" => 7.0, 
        "electricite" => 0.3
    ];

    // Calcul des émissions
    $empreinte_transport = $facteurs[$transport] * 200;
    $empreinte_viande = $viande * 52 * $facteurs["viande"];
    $empreinte_electricite = $electricite * 12 * $facteurs["electricite"];
    $empreinte_totale = $empreinte_transport + $empreinte_viande + $empreinte_electricite;
}

    // Définition du message de résultat
    $message = "<h2>Votre empreinte carbone annuelle est de : <strong>$empreinte_totale kg CO₂</strong></h2>";

    // Conseils personnalisés
    $conseils = "<h3>Conseils pour réduire votre empreinte carbone :</h3>";
    if ($viande > 3) $conseils .= "<p>🥗 Essayez de réduire votre consommation de viande.</p>";
    if ($transport == "voiture") $conseils .= "<p>🚴‍♂️ Privilégiez le covoiturage ou les transports en commun.</p>";
    if ($electricite > 300) $conseils .= "<p>💡 Passez aux ampoules LED et éteignez les appareils inutilisés.</p>";

    echo "<div class='result-container'>$message $conseils <br><a href='index.php'>Revenir au formulaire</a></div>";
    

?>

<style>
    .result-container { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
    h2 { color: #27ae60; }
    h3 { color: #2980b9; }
    p { font-size: 18px; }
    a { text-decoration: none; color: #e74c3c; font-size: 20px; font-weight: bold; }
</style>
 