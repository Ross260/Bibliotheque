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
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom_livre = $_POST['nom_livre'];
    $auteur = $_POST['auteur'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $etat = $_POST['etat'];

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoTmpPath = $_FILES['photo']['tmp_name'];
        $photoName = basename($_FILES['photo']['name']);
        $photoDestination = '../images_livres/' . $photoName;

        // Déplacer le fichier dans le dossier images_livres
        if (move_uploaded_file($photoTmpPath, $photoDestination)) {
            // Insérer les données dans la base de données
            $sql = "INSERT INTO livre (nom_livre, auteur, categorie, description, etat, photo) 
                    VALUES (:nom_livre, :auteur, :categorie, :description, :etat, :photo)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nom_livre' => $nom_livre,
                ':auteur' => $auteur,
                ':categorie' => $categorie,
                ':description' => $description,
                ':etat' => $etat,
                ':photo' => $photoName,
            ]);

            header('Location: bibliothecaire.php');
        } else {
            echo "Erreur lors du téléchargement de la couverture.";
        }
    } else {
        echo "Veuillez sélectionner une couverture pour le livre.";
    }
}
?>
