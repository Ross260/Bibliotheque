<?php include "head_emprunt.php" ?>

<body>

<!-- Enregistrer un Retour -->
<div class="container" style="width: 800px;">
    <div class="section-title">Enregistrer un Retour</div>

    <form>
        <label for="return-book-title">Titre du Livre :</label>
        <input type="text" id="return-book-title" placeholder="Entrez le titre du livre retourné" required>

        <label for="return-date">Date du Retour :</label>
        <input type="date" id="return-date" required>

        <button type="submit">Enregistrer le Retour</button>
    </form>
</div>

    <button class="back-to-top" onclick="redirectToHome()">Retourner à l'accueil</button>

    <script>
        function redirectToHome() {
            window.location.href = "index.php"; // Remplacez par le chemin de la page de destination
        }
    </script>   

</body>
</html>