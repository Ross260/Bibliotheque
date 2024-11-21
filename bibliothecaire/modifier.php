<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'bibliotheque';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_livre = $_POST['id_livre'];
    $nom_livre = $_POST['nom_livre'];
    $categorie = $_POST['categorie'];
    $auteur = $_POST['auteur'];
    $etat = $_POST['etat'];
    $description = $_POST['description'];

    $sql = "UPDATE livre 
            SET nom_livre = :nom_livre, categorie = :categorie, auteur = :auteur, etat = :etat, description = :description 
            WHERE id_livre = :id_livre";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id_livre', $id_livre);
    $stmt->bindParam(':nom_livre', $nom_livre);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        header('Location: bibliothecaire.php');
    } else {
        echo "Erreur lors de la modification du livre.";
    }
}
?>
