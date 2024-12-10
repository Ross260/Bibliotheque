<?php include "head_emprunt.php" ?>

<body>

    <!-- Enregistrer un Retour -->
    <div class="container" style="width: 800px;">
        <div class="section-title">Enregistrer un Retour</div>

        <form method="POST" action="retour_livre.php">
            <label for="return-book-title">Titre du Livre :</label>
            <input type="text" name="titre" id="return-book-title" placeholder="Entrez le titre du livre retourné" required>

            <label for="return-date">Date du Retour :</label>
            <input type="date" name="date" id="return-date" required>

            <input type="text" name="etat" id="due-date" value="disponible" hidden>

            <button type="submit" name="send">Enregistrer le Retour</button>
        </form>

        <div>
            <?php
            if (isset($_POST["send"])) {
                try {
                    // Connexion à la base de données
                    $conn = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    echo "Connexion réussie";

                    // Données de mise à jour
                    $nom = $_POST['titre'];
                    $etat = $_POST['etat'];
                    $date = $_POST['date'];

                    // Requête pour mettre à jour l'état du livre
                    $sql = "UPDATE livre SET etat = :etat WHERE nom_livre = :nom_livre";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':etat', $etat);
                    $stmt->bindParam(':nom_livre', $nom);

                    // Exécution de la mise à jour
                    if ($stmt->execute()) {
                        // Suppression de l'emprunt dans la table `emprunt`
                        $sqlDelete = "DELETE FROM emprunt WHERE titre_livre = :titre_livre";
                        $stmtDelete = $conn->prepare($sqlDelete);
                        $stmtDelete->bindParam(':titre_livre', $nom);

                        if ($stmtDelete->execute()) {
                            echo '<div class="alert alert-success">Livre retourné et supprimé de la liste des emprunts avec succès</div>';
                        } else {
                            echo '<div class="alert alert-danger">Erreur lors de la suppression de l\'emprunt</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Impossible de mettre à jour l\'état du livre</div>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="alert alert-danger">Erreur : ' . $e->getMessage() . '</div>';
                }
            }
            ?>
        </div>
    </div>

    <button class="back-to-top" onclick="redirectToHome()">Retourner à la bibliotheque</button>

    <script>
        function redirectToHome() {
            window.location.href = "resa_et_emprunt.php"; // Remplacez par le chemin de la page de destination
        }
    </script>

</body>

</html>
