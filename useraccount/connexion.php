<?php
// Connexion à la base de données avec mysqli
$id = mysqli_connect("localhost", "root", "", "bibliotheque");

if (!$id) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

// Vérification de la méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $mdp = trim($_POST['mdp']);

    // Préparer la requête pour éviter les injections SQL
    $stmt = $id->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    // Vérification des résultats
    if ($user && $user['mdp'] === $mdp) { // Comparaison directe du mot de passe
        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['prenom'] = $user['prenom'];

        // Vérifiez si l'utilisateur a l'ID égal à 1
        if ($user['id_utilisateur'] == 1) {
            header("Location: bibliothequaire.php"); // Page spécifique pour id = 1
            exit;
        } else {
            header("Location: ../resa_et_emprunt.php"); // Page pour les autres utilisateurs
            exit;
        }
    } else {
        echo "Email ou mot de passe invalide.";
    }

    // Fermer la requête
    $stmt->close();
}

// Fermer la connexion
mysqli_close($id);
