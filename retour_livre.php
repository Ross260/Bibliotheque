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
                $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');

                if ($conn) {
                    echo "connexion reussie";
                }

                // Données de mise à jour
                $nom = $_POST['titre'];
                $etat = $_POST['etat'];
                $date = $_POST['date'];

                // Requête SQL préparée
                $sql = "UPDATE livre SET etat = :etat WHERE nom_livre = :nom_livre";

                // Préparer la requête
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':etat', $etat);
                $stmt->bindParam(':nom_livre', $nom);




                if ($stmt->execute()) {
            ?>
                    <div class="alert alert-success">Livre retourner avec success</div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger">impossible de retourner le livre</div>
            <?php
                }
            }
            ?>
        </div>

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