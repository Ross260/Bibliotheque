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

        .list-container {
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #2C3E50;
        }

        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        #search-input {
            width: 80%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        #search-btn {
            padding: 10px 20px;
            background-color: #A8D5BA;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #search-btn:hover {
            background-color: #A8D5BA;
        }

        .filters {
            margin-bottom: 20px;
        }

        .filters label {
            font-weight: bold;
            margin-right: 10px;
        }

        .filters select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .book-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .book-list li {
            background-color: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .book-details {
            margin-bottom: 10px;
        }

        .reserve-btn {
            background-color: #75ad8c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reserve-btn:hover {
            background-color: #75ad8c;
        }
    </style>
    
</head>
<body>

    <div class="container">
        <!-- Liste des livres -->
        <div class="list-container">
            <h1>Réservation et Emprunt</h1>
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Rechercher un livre...">
                <button id="search-btn">Rechercher</button>
            </div>

            <div class="filters">
                <label for="filter-categorie">Filtrer par Catégorie:</label>
                <select id="filter-categorie">
                    <option value="">Toutes les catégories</option>
                    <option value="fiction">Fiction</option>
                    <option value="romance">Romance</option>
                    <option value="policier">Policier</option>
                    <option value="historique">Historique</option>
                    <option value="horreur">Horreur</option>
                </select>
            </div>

            <ul id="book-list" class="book-list">
                <!-- Les livres seront ajoutés ici dynamiquement -->
            </ul>
        </div>
    </div>

    <script>
   const books = [
    { id: 1, titre: "Shining", auteur: "Stephen King", categorie: "horreur", annee_publication: 1977, Emprunter: true },
    { id: 2, titre: "L'Exorciste", auteur: "William Peter Blatty", categorie: "horreur", annee_publication: 1971, Emprunter: true },
    { id: 3, titre: "Orgueil et Préjugés", auteur: "Jane Austen", categorie: "romance", annee_publication: 1813, Emprunter: true },
    { id: 4, titre: "Les Hauts de Hurlevent", auteur: "Emily Brontë", categorie: "romance", annee_publication: 1847, Emprunter: true },
    { id: 5, titre: "Le Comte de Monte-Cristo", auteur: "Alexandre Dumas", categorie: "historique", annee_publication: 1844, Emprunter: true },
    { id: 6, titre: "Les Piliers de la Terre", auteur: "Ken Follett", categorie: "historique", annee_publication: 1989, Emprunter: true },
    { id: 7, titre: "Le Chien des Baskerville", auteur: "Arthur Conan Doyle", categorie: "policier", annee_publication: 1902, Emprunter: true },
    { id: 8, titre: "La Vérité sur l'affaire Harry Quebert", auteur: "Joël Dicker", categorie: "policier", annee_publication: 2012, Emprunter: true },
    { id: 9, titre: "1984", auteur: "George Orwell", categorie: "fiction", annee_publication: 1949, Emprunter: true },
    { id: 10, titre: "Le Meilleur des mondes", auteur: "Aldous Huxley", categorie: "fiction", annee_publication: 1932, Emprunter: true }
];


        // Fonction pour afficher la liste des livres
        function renderBooks(filteredBooks) {
            const bookList = document.getElementById("book-list");
            bookList.innerHTML = ''; // Réinitialise la liste

            filteredBooks.forEach(book => {
                const listItem = document.createElement("li");
                listItem.innerHTML = `
                    <div class="book-details">
                        <strong>${book.titre}</strong> par ${book.auteur} (${book.categorie}, ${book.annee_publication})
                    </div>
                    <a href="enregistrement_emprunt.php?id=${book.id}?titre=${book.titre}" class="reserve-link ${book.disponible ? "disabled-link" : ""} btn btn-primary">
                        ${book.disponible ? "Disponible" : "Réserver"}
                    </a>
                `;
                bookList.appendChild(listItem);
            });
        }

        // Fonction pour afficher la liste des livres



        // Fonction de recherche
        document.getElementById("search-btn").addEventListener("click", () => {
            const searchInput = document.getElementById("search-input").value.toLowerCase();
            const filteredBooks = books.filter(book =>
                book.titre.toLowerCase().includes(searchInput) ||
                book.auteur.toLowerCase().includes(searchInput)
            );
            renderBooks(filteredBooks);
        });

       // Fonction de filtre par catégorie
document.getElementById("filter-categorie").addEventListener("change", () => {
    const selectedCategory = document.getElementById("filter-categorie").value;
    const filteredBooks = books.filter(book => {
        // Si une catégorie est sélectionnée, on filtre, sinon on affiche tous les livres
        return !selectedCategory || book.categorie.toLowerCase() === selectedCategory.toLowerCase();
    });
    renderBooks(filteredBooks);
});


        // Fonction pour réserver un livre
        function reserveBook(bookId) {
            const book = books.find(b => b.id === bookId);
            if (book) {
                alert(`Vous avez réservé "${book.titre}". Vous serez notifié lorsque le livre sera disponible.`);
                // Simule l'ajout de la réservation (en réalité, il faudrait mettre à jour la base de données ici)
                book.disponible = true; // Pour simuler que le livre est maintenant disponible
                renderBooks(books); // Rafraîchit la liste
            }
        }

        // Initialiser la page
        renderBooks(books);
    </script>
</body>
</html>
