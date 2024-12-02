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
// Récupérer les emprunts de l'utilisateur connecté
$userName = $_SESSION['prenom']; // Nom de l'utilisateur connecté (doit être stocké dans la session)
$sqlEmprunts = "SELECT id_emprunt, titre_livre, date_emprunt, date_remise
                FROM emprunt
                WHERE nom = :nom";
 // Nom correspond à l'utilisateur connecté
$stmtEmprunts = $pdo->prepare($sqlEmprunts);
$stmtEmprunts->execute(['nom' => $userName]);
$emprunts = $stmtEmprunts->fetchAll(PDO::FETCH_ASSOC);
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
       /* Barre latérale */
.sidebar {
    width: 260px;
    background-color: #ecddbd;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* S'assurer que les éléments sont alignés en haut */
    font-family: Arial, sans-serif;
    border-right: 1px solid #ddd;
}

/* Repositionnement des éléments dans la barre latérale */
.user-info {
    text-align: center;
    margin-bottom: 20px;
}

.menu {
    list-style: none;
    padding: 0;
    margin-top: 10px; /* Ajout d'un espacement pour les éléments du menu */
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

/* Changer la couleur d'active pour les onglets */
.menu li a.active {
    background-color: white; /* Enlever le fond vert */
    color: #2C3E50; /* Garder la couleur du texte */
}

.menu li a:hover {
    background-color: #A8D5BA;
    color: white;
}

.menu.bottom {
    margin-top: auto; /* S'assurer que la section Notifications reste en bas */
}

/* Retirer le vert autour du bouton Bibliothèque */
.tabs .tab.active {
    background-color: white; /* Enlever la couleur d'arrière-plan verte */
    color: #2C3E50; /* Garder la couleur du texte */
    border-color: #ddd; /* Conserver la bordure classique */
}

/* Autres styles (inchangés) */
footer {
    margin-top: 150px;
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

.tabs .tab {
    padding: 10px 15px;
    border: 1px solid #ddd;
    background-color: white;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.tabs .tab.active {
    background-color: white;
    color: #2C3E50;
    border-color: #ddd;
}

.tabs .tab:hover {
    background-color: #A8D5BA;
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
                <h2>Bienvenue <?= $_SESSION['prenom'] ?></span></h2>
                
            </div>
            <nav>
            <ul class="menu">
                    <li><a href="index.php"><i class="icon-home"></i> Accueil</a></li>
                    <li class="active"><a href="#" class="tab" data-section="bibliotheque"><i class="icon-library"></i> Bibliothèque</a></li>
                    <li><a href="#" class="tab" data-section="ma-liste"><i class="icon-list"></i> Ma liste</a></li> <!-- Onglet "Ma liste" -->
                </ul>
                <ul class="menu bottom">
                    <li><a href="notif.html"><i class="icon-message"></i> Notifications</a></li>
                </ul>
            </nav>
            <footer>
                <a href="user_register.php" class="logout"><i class="icon-logout"></i> Se déconnecter</a>
                <p>BiblioSmart</p>
                <small>Tous droits réservés</small>
            </footer>
        </aside>


        <!-- Contenu principal -->
        <main class="main-content">
            <header>
                <h1></h1>
            </header>



            <!-- Onglets -->
            <section class="tabs">
                <!-- <button class="tab active" data-section="all">Tous</button> -->

                <section class="tabs" id="bibliotheque-section">
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
                                ?> 
                                    <a href="enregistrement_emprunt.php?id=<?= $book['id_livre'] ?>&titre=<?= urlencode($book['nom_livre']) ?>" class="btn btn-primary w-100">
                                        <?= "Emprunter"; ?>
                                    </a>
                                <?php } else { ?>
                                    <a href="reservation.php?id=<?= $book['id_livre'] ?>&titre=<?= urlencode($book['nom_livre']) ?>" class="btn btn-success w-100">
                                        <?= "Reserver"; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="list-section" id="ma-liste-section" style="display: none;">
    <h2>Ma Liste</h2>
    <?php if (empty($emprunts)): ?>
        <p>Aucun livre emprunté pour le moment.</p>
    <?php else: ?>
        <div class="book-list row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($emprunts as $emprunt): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($emprunt['titre_livre']) ?></h5>
                            <p class="card-text"><strong>Date d'emprunt :</strong> <?= htmlspecialchars($emprunt['date_emprunt']) ?></p>
                            <p class="card-text"><strong>Date de remise prévue :</strong> <?= htmlspecialchars($emprunt['date_remise']) ?></p>
                        </div>
                        <div class="card-footer">
                            <!-- Bouton Retourner -->
                            <a href="retour_livre.php?id=<?= urlencode($emprunt['id_emprunt']) ?>&titre=<?= urlencode($emprunt['titre_livre']) ?>" class="btn btn-danger w-100">
Retourner
</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <button id="back-to-bibliotheque" class="btn btn-secondary">Retour à la bibliothèque</button>
</section>

        </main>
    </div>
   <script>
    // Gérer les onglets
document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
        // Réinitialiser tous les onglets
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        // Cacher toutes les sections
        document.querySelectorAll('.tabs > section').forEach(section => {
            section.style.display = 'none';
        });

        // Afficher la section correspondante
        const sectionId = tab.getAttribute('data-section') + '-section';
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
        }
    });
});

// Pour revenir à la bibliothèque
const backToBibliothequeBtn = document.getElementById("back-to-bibliotheque");
if (backToBibliothequeBtn) {
    backToBibliothequeBtn.addEventListener("click", () => {
        // Cacher toutes les sections
        document.querySelectorAll('.tabs > section').forEach(section => {
            section.style.display = 'none';
        });

        // Afficher la section bibliothèque
        const bibliothequeSection = document.getElementById("bibliotheque-section");
        if (bibliothequeSection) {
            bibliothequeSection.style.display = 'block';
        }
    });
}


    // Pour revenir à la bibliothèque
    document.getElementById("back-to-bibliotheque").addEventListener("click", () => {
        // Afficher la barre latérale
        document.getElementById("sidebar").style.display = 'block';

        // Cacher la section "Ma Liste"
        document.getElementById("ma-liste-section").style.display = 'none';

        // Afficher la section bibliothèque
        document.getElementById("bibliotheque-section").style.display = 'block';
    });
</script>
</body>

</html>