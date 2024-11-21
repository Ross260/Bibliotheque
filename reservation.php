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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="script.js" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        .hidden {
            display: none;
        }

        #successMessage {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Réservation de Livre</h1>
        <form id="reservationForm" method="POST" action="reservation.php">
            <div class="form-group">
                <label for="user">Utilisateur :</label>
                <input type="text" name="name" id="borrower-name" placeholder="Entrez le nom de l'utilisateur" value="<?= $_SESSION['prenom'] ?>" required>

            </div>

            <div class="form-group">
                <label for="book">Livre :</label>
                <input type="text" name="titre" id="book-title" placeholder="Entrez le titre du livre" value="<?php if (isset($_GET['id'])) {
                                                                                                                    echo $titre;
                                                                                                                } ?>" required>
            </div>

            <div class="form-group">
                <label for="reservationDate">Date de réservation :</label>
                <input type="text" id="reservationDate" name="reservationDate" required placeholder="jj/mm/aaaa">
            </div>

            <button type="submit" name="bout" class="btn">Réserver</button>
        </form>

        <div id="successMessage" class="hidden">
            <p>La réservation a été effectuée avec succès !</p>
        </div>

        <?php
        if (isset($_POST["bout"])) {
            $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
            // Données de mise à jour
            $nom = $_POST['name']; // Nom du livre depuis un formulaire
            $titre = $_POST['titre'];
            $date_resa = $_POST['reservationDate'];

            // pour les emprunts
            $sql = "INSERT INTO reservation (nom, titre_livre, date_resa) VALUES (:nom, :titre, :reservationDate)";
            $stmt = $conn->prepare($sql);

            // Lier les paramètres pour sécuriser les données
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->bindParam(':reservationDate', $date_resa, PDO::PARAM_STR);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "<div class='alert alert-success' style='margin-top:20px;'>Reservation enregistré avec succès.</div>";
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de l'enregistrement de la reservation</div>";
            }
        }
        ?>

    </div>


    <button class="back-to-top" onclick="redirectToHome()">Retourner la biliothèque</button>

    <script>
        function redirectToHome() {
            window.location.href = "resa_et_emprunt.php"; // Remplacez par le chemin de la page de destination
        }
    </script>
</body>

</html>