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

    $sql = "DELETE FROM livre WHERE id_livre = :id_livre";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id_livre', $id_livre);

    if ($stmt->execute()) {
        header('Location: bibliothecaire.php');
    } else {
        echo "Erreur lors de la suppression du livre.";
    }
}
?>
