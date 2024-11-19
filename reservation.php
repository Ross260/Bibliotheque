<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Livre</title>
    <link rel="stylesheet" href="styles.css">
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

select, input[type="date"] {
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
                <select id="user" name="user" required>
                    <option value="">-- Sélectionnez un utilisateur --</option>
                    <option value="user1">Alice Dupont</option>
                    <option value="user2">Jean Martin</option>
                    <option value="user3">Claire Fontaine</option>
                </select>
            </div>

            <div class="form-group">
                <label for="book">Livre :</label>
                <select id="book" name="book" required>
                    <option value="">-- Sélectionnez un livre --</option>
                    <option value="book1">1984 - George Orwell</option>
                    <option value="book2">Le Petit Prince - Antoine de Saint-Exupéry</option>
                    <option value="book3">Les Misérables - Victor Hugo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reservationDate">Date de réservation :</label>
                <input type="date" id="reservationDate" name="reservationDate" required>
            </div>

            <button type="submit" class="btn">Réserver</button>
        </form>

        <div id="successMessage" class="hidden">
            <p>La réservation a été effectuée avec succès !</p>
        </div>
    </div>
</body>
</html>
