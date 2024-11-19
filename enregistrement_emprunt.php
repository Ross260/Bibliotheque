
<?php include "head_emprunt.php" ?>

    <!-- Conteneur principal -->
    <div class="container">

        <!-- En-tête -->
        <div class="header">
            <h2>Enregistrer des Emprunts de livres</h2>
        </div>
        <!-- Enregistrer un Emprunt -->
        <div class="form-section" id="borrow">
            <div class="section-title">Enregistrer un Emprunt</div>
            <form>
                <label for="borrower-name">Nom de l'Utilisateur :</label>
                <input type="text" id="borrower-name" placeholder="Entrez le nom de l'utilisateur" required>

                <label for="book-title">Titre du Livre :</label>
                <input type="text" id="book-title" placeholder="Entrez le titre du livre" required>

                <label for="borrow-date">Date de l'Emprunt :</label>
                <input type="date" id="borrow-date" required>

                <label for="due-date">Date d'Échéance :</label>
                <input type="date" id="due-date" required>

                <button type="submit">Enregistrer l'Emprunt</button>
            </form>
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
