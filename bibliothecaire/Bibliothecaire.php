<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création et Gestion des Livres</title>
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

        .header-container {
            display: flex;
            align-items: center;
            width: 100%;
            padding-right: 2rem;
            /* Ajoute de l'espace à droite */
        }

        nav {
            display: flex;
            gap: 1.5rem;
            margin-left: auto;
            /* Décale les boutons à droite */
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

        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #A8D5BA;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #2C3E50;
            border-bottom: 2px solid #A8D5BA;
            padding-bottom: 0.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: bold;
        }

        input,
        select,
        button {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus,
        select:focus {
            border-color: #A8D5BA;
            outline: none;
            box-shadow: 0 0 5px rgba(250, 108, 94, 0.5);
        }

        button {
            background-color: #A8D5BA;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            padding: 0.8rem;
            border-radius: 4px;
            font-size: 1rem;
        }

        button:hover {
            background-color: #75ad8c;
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #A8D5BA;
            color: white;
            border: none;
            padding: 0.8rem 1rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .back-to-top:hover {
            background-color: #75ad8c;
        }

        /* Style pour la liste des utilisateurs */
        .user-list {
            margin-top: 2rem;
        }

        .user-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-list th,
        .user-list td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        .user-list th {
            background-color: #A8D5BA;
            color: white;
        }

        .user-list td {
            background-color: #f9f9f9;
        }

        .user-list td button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            border-radius: 4px;
        }

        .user-list td button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <h1>BiblioSmart</h1>
            <nav>
                <a href="#add">Ajouter un Livre</a>
                <a href="#edit">Modifier un Livre</a>
                <a href="#delete">Supprimer un Livre</a>
                
                <a href="livres.php">Livres</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Création et Gestion des Livres</h2>

        <!-- Ajouter un livre -->
        <div class="form-section" id="add">
            <div class="section-title">Ajouter un Livre</div>
            <form action="ajouter.php" method="post" enctype="multipart/form-data">
                <label for="book-title">Titre du Livre :</label>
                <input type="text" id="book-title" name="nom_livre" placeholder="Entrez le titre du livre" required>

                <label for="book-author">Auteur :</label>
                <input type="text" id="book-author" name="auteur" placeholder="Entrez le nom de l'auteur" required>

                <label for="book-category">Catégorie :</label>
                <select id="book-category" name="categorie" required>
                    <option value="">Sélectionner une catégorie</option>
                    <option value="fiction">Fiction</option>
                    <option value="romance">Romance</option>
                    <option value="policier">Policier</option>
                    <option value="historique">Historique</option>
                    <option value="horreur">Horreur</option>
                </select>

                <label for="book-description">Description :</label>
                <textarea id="book-description" name="description" placeholder="Entrez une description du livre" required></textarea>

                <label for="book-state">État :</label>
                <select id="book-state" name="etat" required>
                    <option value="">Sélectionner l'état</option>
                    <option value="disponible">Disponible</option>
                    <option value="indisponible">Indisponible</option>
                    <option value="reserve">Reservé</option>
                </select>

                <!-- Champ pour télécharger un fichier -->
                <label for="book-cover">Couverture du Livre :</label>
                <input type="file" id="book-cover" name="photo" accept="image/*" required>

                <button type="submit">Ajouter</button>
            </form>
        </div>




        <!-- Modifier un livre -->
        <div class="form-section" id="edit">
            <div class="section-title">Modifier un Livre</div>
            <form action="modifier.php" method="post">
                <input type="number" name="id_livre" placeholder="ID du livre" required>
                <input type="text" name="nom_livre" placeholder="Nom du livre" required>
                <input type="text" name="categorie" placeholder="Catégorie" required>
                <input type="text" name="auteur" placeholder="Auteur" required>
                <input type="text" name="etat" placeholder="État" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <button type="submit">Modifier</button>
            </form>

        </div>

        <!-- Supprimer un livre -->
        <div class="form-section" id="delete">
            <div class="section-title">Supprimer un Livre</div>
            <form action="supprimer.php" method="post">
                <input type="number" name="id_livre" placeholder="ID du livre" required>
                <button type="submit" name="action" value="supprimer">Supprimer</button>
            </form>

        </div>

    </div>
    </div>
    <button class="back-to-top" onclick="redirectToHome()">Retourner à l'accueil</button>

    <script>
        function redirectToHome() {
            window.location.href = "../index.php"; // Remplacez par le chemin de la page de destination
        }
    </script>
</body>

</html>