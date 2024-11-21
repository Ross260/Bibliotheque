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
        <form id="reservationForm">
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
                <input type="date" id="reservationDate" name="reservationDate" required>
            </div>

            <button type="submit" name="bout" class="btn">Réserver</button>
        </form>

        <div id="successMessage" class="hidden">
            <p>La réservation a été effectuée avec succès !</p>
        </div>
    </div>
</body>

</html>


<?php
        if (isset($_POST["bout"])) {
            $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');

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