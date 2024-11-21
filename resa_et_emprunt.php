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
    <title>Ma Bibliothèque</title>
    <style>
        /* Réinitialisation */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corps principal */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh;
            background-color: #F0E6D2;
        }

        .container {
            display: flex;
            width: 100%;
        }

        /* Barre latérale */
        .sidebar {
            width: 260px;
            background-color: #ecddbd;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: Arial, sans-serif;
            border-right: 1px solid #ddd;
        }

        .user-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-info .avatar {
            width: 60px;
            height: 60px;
            background-color: #e0e0e0;
            border-radius: 50%;
            margin: 0 auto 10px;
        }

        .user-info h2 {
            font-size: 16px;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .user-info .add-btn {
            background-color: #A8D5BA;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            margin-top: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .user-info .add-btn:hover {
            background-color: #2C3E50;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin-bottom: 10px;
        }

        .menu li a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #2C3E50;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu li a i {
            margin-right: 10px;
            font-size: 16px;
        }

        .menu li a:hover,
        .menu li.active a {
            background-color: #A8D5BA;
            color: white;
        }

        .menu.bottom {
            margin-top: 20px;
        }

        .notif {
            background-color: #A8D5BA;
            color: white;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
            margin-left: auto;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        footer .logout {
            text-decoration: none;
            color: #2C3E50;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-bottom: 10px;
        }

        footer .logout i {
            margin-right: 5px;
        }


        footer small {
            display: block;
            margin-top: 5px;
            color: #999;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0;
            overflow: auto;
        }

        header h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #34495e;
        }

        /* Onglets */
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 40px;
        }

        .tabs .tab {
            padding: 10px 15px;
            border: 1px solid #ddd;
            background-color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .tabs .tab.active {
            background-color: #75ad8c;
            color: white;
            border-color: #75ad8c;
        }

        .tabs .tab:hover {
            background-color: #75ad8c;
            color: white;
        }

        /* Listes */
        .list {
            list-style: none;
            padding: 0;
        }

        .list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .list .view-btn {
            background-color: #A8D5BA;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .list .view-btn:hover {
            background-color: #A8D5BA;
        }
    </style>

    <style>
        .tabs body {
            font-family: Arial, sans-serif;
            background-color: #F0E6D2;
            margin: 0;
            padding: 0;
        }

        .tabs .container {
            display: flex;
            justify-content: center;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            flex-direction: column;
        }

        .tabs h1 {
            text-align: center;
            color: #2C3E50;
        }

        .tabs .filters,
        .tabs .search-container {
            margin-bottom: 20px;
        }

        .tabs #search-input {
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .tabs #search-btn,
        .tabs select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .tabs .book-list .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="user-info">
                <h2>Bienvenue, <span class="username"></span></h2>
                <button class="add-btn" onclick="redirectToAddBook()">Ajouter un livre</button>
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="acceuil.html"><i class="icon-home"></i> Accueil</a></li>
                    <li class="active"><a href="#"><i class="icon-library"></i> Bibliothèque</a></li>
                </ul>
                <ul class="menu bottom">
                    <li><a href="notif.html"><i class="icon-message"></i> Notifications</a></li>
                </ul>
            </nav>
            <footer>
                <a href="#" class="logout"><i class="icon-logout"></i> Se déconnecter</a>
                <p>BiblioSmart</p>
                <small>Tous droits réservés</small>
            </footer>
        </aside>


        <!-- Contenu principal -->
        <main class="main-content">
            <header>
                <h1> Salut <?= $_SESSION['prenom'] ?>, Bienvenue dans la bibliothèque de livre</h1>
            </header>



            <!-- Onglets -->
            <section class="tabs">
                <!-- <button class="tab active" data-section="all">Tous</button> -->

                <div class="container">

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

            </section>
            <section class="list-section" id="listes-section" style="display: none;">
                <p>Aucune liste à afficher pour le moment.</p>
            </section>
        </main>
    </div>
    <script>
        function redirectToAddBook() {
            window.location.href = "resa.html"; // Redirige vers la page d'ajout de livre
        }

        // Gérer les onglets
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Réinitialiser tous les onglets
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Afficher ou masquer les sections
                const sectionId = tab.dataset.section + '-section';
                document.querySelectorAll('.list-section').forEach(section => {
                    section.style.display = section.id === sectionId ? 'block' : 'none';
                });
            });
        });

        // Simulation de récupération du nom d'utilisateur après connexion
        document.addEventListener('DOMContentLoaded', () => {
            // Exemple : récupération du nom via une API ou une base de données
            const username = ""; // Vous pouvez remplacer par une valeur dynamique

            // Injecter le nom d'utilisateur dans le HTML
            const usernameElement = document.querySelector('.username');
            if (usernameElement) {
                usernameElement.textContent = username;
            }
        });
    </script>
</body>

</html>