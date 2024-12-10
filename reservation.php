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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #198754;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #198754;
        }

        .alert {
            margin-top: 20px;
        }

        .back-to-top {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-to-top:hover {
            background-color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Réservation de Livre</h1>
        <form id="reservationForm" method="POST" action="reservation.php">
            <div class="form-group">
                <label for="borrower-name">Utilisateur :</label>
                <input type="text" name="name" id="borrower-name" placeholder="Entrez le nom de l'utilisateur" value="<?= $_SESSION['prenom'] ?>" required>
            </div>

            <div class="form-group">
                <label for="book-title">Livre :</label>
                <input type="text" name="titre" id="book-title" placeholder="Entrez le titre du livre" value="<?= isset($titre) ? $titre : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="reservationDate">Date de réservation :</label>
                <input type="text" id="reservationDate" name="reservationDate" required placeholder="jj/mm/aaaa">
            </div>

            <button type="submit" name="bout" class="btn">Réserver</button>
        </form>

        <?php
        if (isset($_POST["bout"])) {
            try {
                $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $nom = $_POST['name'];
                $titre = $_POST['titre'];
                $date_resa = $_POST['reservationDate'];

                $sql = "INSERT INTO reservation (nom, titre_livre, date_resa) VALUES (:nom, :titre, :reservationDate)";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
                $stmt->bindParam(':reservationDate', $date_resa, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Réservation enregistrée avec succès.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Erreur lors de l'enregistrement de la réservation.</div>";
                }
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
            }
        }
        ?>

        <a class="back-to-top" href="resa_et_emprunt.php">Retourner à la bibliothèque</a>
    </div>
</body>

</html>
