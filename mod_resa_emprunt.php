<?php
session_start();
// Connexion à la base de données
$host = 'localhost';
$dbname = 'bibliotheque';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des paramètres de recherche et de filtre
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$categorie = isset($_GET['categorie']) ? trim($_GET['categorie']) : '';

// Préparation de la requête SQL avec les conditions de recherche et de filtre
$sql = "SELECT * FROM livre WHERE 1";
$params = [];

if (!empty($search)) {
    $sql .= " AND (nom_livre LIKE :search OR auteur LIKE :search)";
    $params[':search'] = "%$search%";
}

if (!empty($categorie)) {
    $sql .= " AND categorie = :categorie";
    $params[':categorie'] = $categorie;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des Livres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0E6D2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #2C3E50;
        }

        .filters,
        .search-container {
            margin-bottom: 20px;
        }

        #search-input {
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        #search-btn,
        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .book-list .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>bonjour <?= $_SESSION['prenom'] ?></p>
        <h1>Réservation et Emprunt</h1>

        <!-- Formulaire de recherche -->
        <form method="GET" action="" class="search-container">
            <input type="text" id="search-input" name="search" placeholder="Rechercher un livre..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit" id="search-btn" class="btn btn-primary">Rechercher</button>
        </form>

        <!-- Formulaire de filtre -->
        <form method="GET" action="" class="filters">
            <label for="filter-categorie">Filtrer par Catégorie:</label>
            <select id="filter-categorie" name="categorie" onchange="this.form.submit()">
                <option value="">Toutes les catégories</option>
                <option value="FICTION" <?= $categorie === 'FICTION' ? 'selected' : '' ?>>Fiction</option>
                <option value="ROMANCE" <?= $categorie === 'ROMANCE' ? 'selected' : '' ?>>Romance</option>
                <option value="POLICIER" <?= $categorie === 'POLICIER' ? 'selected' : '' ?>>Policier</option>
                <option value="HISTORIQUE" <?= $categorie === 'HISTORIQUE' ? 'selected' : '' ?>>Historique</option>
                <option value="horreur" <?= $categorie === 'horreur' ? 'selected' : '' ?>>Horreur</option>
            </select>
        </form>

        <!-- Liste des livres -->
        <div class="book-list row row-cols-1 row-cols-md-3 g-4">
            <?php if (empty($books)): ?>
                <p>Aucun livre trouvé.</p>
            <?php else: ?>
                <?php foreach ($books as $book): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="images_livres/<?= htmlspecialchars($book['nom_livre']) ?>.png" class="card-img-top" alt="<?= htmlspecialchars($book['nom_livre']) ?>" style="height:200px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($book['nom_livre']) ?></h5>
                                <p class="card-text">Par <strong><?= htmlspecialchars($book['auteur']) ?></strong></p>
                                <p class="card-text"><small class="text-muted"><?= htmlspecialchars($book['categorie']) ?> - <?= htmlspecialchars($book['description']) ?></small></p>
                            </div>
                            <div class="card-footer">
                                <?php
                                if (strtolower($book['etat']) === 'disponible') {

                                ?> <a href="enregistrement_emprunt.php?id=<?= $book['id_livre'] ?>&titre=<?= urlencode($book['nom_livre']) ?>" class="btn btn-primary w-100">
                                        <?= "Emprunter"; ?>
                                    </a>
                                <?php
                                } else {
                                ?>

                                    <a href="reservation.php?id=<?= $book['id_livre'] ?>&titre=<?= urlencode($book['nom_livre']) ?>" class="btn btn-success w-100">
                                        <?= "Reserver"; ?>
                                    </a>
                                <?php
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>