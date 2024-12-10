<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F0E6D2;
            color: #2C3E50;
        }

        header {
            background-color: #ecddbd;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        nav {
            display: flex;
            gap: 1.5rem;
            margin-left: auto;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            transition: color 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        nav a:hover {
            color: #75ad8c;
        }

        .container {
            max-width: 1100px;
            margin: 6rem auto 2rem;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #A8D5BA;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1.8rem;
        }

        .book-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .book-list th,
        .book-list td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        .book-list th {
            background-color: #A8D5BA;
            color: white;
        }

        .book-list td {
            background-color: #f9f9f9;
        }

        .book-list td img {
            width: 100px;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <h1>BiblioSmart</h1>
            <nav>
                <a href="Bibliothecaire.php">Gestion des livres</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Liste des Livres</h2>
        <div class="book-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom du Livre</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>État</th>
                        <th>Description</th>
                        <th>Couverture</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connexion à la base de données
                    $conn = new mysqli('localhost', 'root', '', 'bibliotheque');

                    // Vérification de la connexion
                    if ($conn->connect_error) {
                        die("Connexion échouée : " . $conn->connect_error);
                    }

                    // Requête pour récupérer les livres
                    $sql = "SELECT id_livre, nom_livre, categorie, auteur, etat, description, photo FROM livre";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Affichage des données dans les lignes du tableau
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['id_livre'] . "</td>
                                    <td>" . htmlspecialchars($row['nom_livre']) . "</td>
                                    <td>" . htmlspecialchars($row['categorie']) . "</td>
                                    <td>" . htmlspecialchars($row['auteur']) . "</td>
                                    <td>" . htmlspecialchars($row['etat']) . "</td>
                                    <td>" . htmlspecialchars($row['description']) . "</td>
                                    
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Aucun livre trouvé.</td></tr>";
                    }

                    // Fermeture de la connexion
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
