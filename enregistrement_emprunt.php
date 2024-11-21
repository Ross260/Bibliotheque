<?php
include "head_emprunt.php";
?>

<?php
session_start();
if (isset($_GET['id'])) {


    // Vérification et récupération des paramètres
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    $titre = isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '';

    // Vérifier si les paramètres sont valides
    if (!$id || !$titre) {
        echo "Erreur : informations manquantes.";
        exit;
    }
}
?>


<!-- Conteneur principal -->
<div class="container">

    <!-- En-tête -->
    <div class="header">
        <h2>Enregistrer des Emprunts de livres</h2>
    </div>
    <!-- Enregistrer un Emprunt -->
    <div class="form-section" id="borrow">
        <div class="section-title">Enregistrer un Emprunt</div>
        <form method="POST" action="enregistrement_emprunt.php">
            <label for="borrower-name">Nom de l'Utilisateur :</label>
            <input type="text" name="name" id="borrower-name" placeholder="Entrez le nom de l'utilisateur" value="<?= $_SESSION['prenom'] ?>" required readonly>

            <label for="book-title">Titre du Livre :</label>
            <input type="text" name="titre" id="book-title" placeholder="Entrez le titre du livre" value="<?php if (isset($_GET['id'])) {
                                                                                                                echo $titre;
                                                                                                            } ?>" required readonly>

            <label for="borrow-date">Date de l'Emprunt :</label>

            <input type="text" name="date_entree" id="borrow-date" value="<?php echo date("d/m/Y"); ?>" required readonly>

            <?php

            // Obtenir la date d'aujourd'hui
            $date = new DateTime();

            // Ajouter 15 jours
            $date->modify('+15 days');

            ?>

            <label for="due-date">Date d'Échéance :</label>
            <input type="text" name="date_sortie" value="<?php echo $date->format('d/m/Y'); ?>" required readonly>
            <input type="text" name="etat" value="indisponible" hidden>

            <button type="submit" name="bout">Enregistrer l'Emprunt</button>
        </form>
    </div>

    <div>
        <?php
        if (isset($_POST["bout"])) {
            $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');

            if ($conn) {
                // echo "connexion reussie";
            }
            if (isset($_POST["bout"])) {
                // Connexion à la base de données

                // Données de mise à jour
                $nom = $_POST['name']; // Nom du livre depuis un formulaire
                $etat = $_POST['etat'];     // Nouvel état depuis un formulaire
                $titre = $_POST['titre'];
                $date_entree = $_POST['date_entree'];
                $date_sortie = $_POST['date_sortie'];

                // Requête SQL préparée
                $sql = "UPDATE livre SET etat = :etat WHERE nom_livre = :nom_livre";
                // Préparer la requête
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':etat', $etat);
                $stmt->bindParam(':nom_livre', $titre);
            }
            if ($stmt->execute()) {
        ?>
                <div class="alert alert-success">Livre emprunter avec success</div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger">impossible d'emprunter le livre</div>
        <?php
            }




            // pour les emprunts
            $sql = "INSERT INTO emprunt (nom, titre_livre, date_emprunt, date_remise) 
        VALUES (:nom, :titre, :date_entree, :date_sortie)";
            $stmt = $conn->prepare($sql);

            // Lier les paramètres pour sécuriser les données
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->bindParam(':date_entree', $date_entree, PDO::PARAM_STR);
            $stmt->bindParam(':date_sortie', $date_sortie, PDO::PARAM_STR);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Emprunt enregistré avec succès.</div>";
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de l'enregistrement de l'emprunt</div>";
            }
        }
        ?>
    </div>

</div>



<button class="back-to-top" onclick="redirectToHome()">Retourner à l'accueil</button>

<script>
    function redirectToHome() {
        window.location.href = "index.php"; // Remplacez par le chemin de la page de destination
    }
</script>
</body>

</html>