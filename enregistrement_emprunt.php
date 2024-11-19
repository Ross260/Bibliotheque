
<?php 
    include "head_emprunt.php"; 
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
                <input type="text" name="name" id="borrower-name" placeholder="Entrez le nom de l'utilisateur" required>

                <label for="book-title">Titre du Livre :</label>
                <input type="text" name="titre" id="book-title" placeholder="Entrez le titre du livre" required>

                <label for="borrow-date">Date de l'Emprunt :</label>
                <input type="date" name="date_entree" id="borrow-date" required>

                <label for="due-date">Date d'Échéance :</label>
                <input type="date" name="date_sortie" required>
                <input type="text" name="etat" value="indisponible" hidden>

                <button type="submit" name="bout">Enregistrer l'Emprunt</button>
            </form>
        </div>

        <div>
            <?php 
                if(isset($_POST["bout"])){
                    $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');

                    if ($conn) {
                        echo "connexion reussie";
                    }
                    if(isset($_POST["bout"])){
                        // Connexion à la base de données

                    // Données de mise à jour
                    $nom = $_POST['titre']; // Nom du livre depuis un formulaire
                    $etat = $_POST['etat'];     // Nouvel état depuis un formulaire
        
                    // Requête SQL préparée
                    $sql = "UPDATE livre SET etat = :etat WHERE nom_livre = :nom_livre";

                    // Préparer la requête
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':etat', $etat);
                    $stmt->bindParam(':nom_livre', $nom);


                        
                    }
                    if ($stmt->execute()) {
                        ?> 
                            <div class="alert alert-success">Livre emprunter avec success</div>
                        <?php
                    }else {
                        ?> 
                            <div class="alert alert-danger">impossible d'emprunter le livre</div>
                        <?php
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
