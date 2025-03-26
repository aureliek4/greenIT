<?php 
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transport = $_POST['transport'];
    $viande = intval($_POST['viande']);
    $electricite = intval($_POST['electricite']);
    $nom = $_POST['nom'];
    // Facteurs d’émission en kg CO₂
    $facteurs = [
        "voiture" => 2.4, 
        "avion" => 15.0, 
        "bus" => 0.8, 
        "vélo" => 0.0, 
        "marche" => 0.0,
        "viande" => 7.0, 
        "electricite" => 0.3,
    ];

    // Calcul des émissions
    $empreinte_transport = $facteurs[$transport] * 200;
    $empreinte_viande = $viande * 52 * $facteurs["viande"];
    $empreinte_electricite = $electricite * 12 * $facteurs["electricite"];
    $empreinte_totale = $empreinte_transport + $empreinte_viande + $empreinte_electricite;
}
$sql ="INSERT INTO utilisateurs(nom,transport,repas_viande,consommation_electricite,empreinte_totale)
VALUES('$nom','$transport',$viande,$electricite,$empreinte_totale)";
$conn->exec($sql);
header("location:resultat.php");
echo'Entrée ajouté dans la table';
$conn->close();
?>