<?php include "head_emprunt.php" ?>

<body>

    <!-- Envoyer un Rappel -->
    <div class="container">
            <div class="section-title">Envoyer un Rappel</div>
            <form>
                <label for="notify-user">Utilisateur à Notifier :</label>
                <input type="text" id="notify-user" placeholder="Entrez le nom de l'utilisateur" required>

                <label for="reminder-message">Message de Rappel :</label>
                <textarea id="reminder-message" rows="4" placeholder="Entrez le message de rappel..." required></textarea>

                <button type="submit">Envoyer le Rappel</button>
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