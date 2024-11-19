<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Acceuil</title>
</head>

        <body>
            <!-- Barre de navigation -->
            <nav style="background-color: #ecddbd; padding: 1rem 2rem; position: relative; top: 10px; color: white;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <!-- Lien gauche -->
                    <ul style="list-style-type: none; display: flex; gap: 1.5rem; margin: 0; padding: 0;">
                        <li><a href="creaGBibli.html" style="color: #2C3E50; text-decoration: none;">Création et Gestion des Livres</a></li>
                        <li><a href="enregistrement_emprunt.php" style="color: #2C3E50; text-decoration: none;">Gestion des Emprunts</a></li>
                        <li><a href="reservation.php" style="color: #2C3E50; text-decoration: none;">Réservations</a></li>
                    </ul>
        
                    <!-- Nom du site centré -->
                    <div style="color: #A8D5BA(49, 62, 184); font-size: 1.8rem; font-weight: bold; text-align: center; margin-left: -340px;">BiblioSmart</div>
        
                    <!-- Lien droite -->
                    <ul style="list-style-type: none; display: flex; gap: 1.5rem; margin: 0; padding: 0;">
                        <li><a href="securite.html" style="color: #2C3E50; text-decoration: none;">Sécurité et Accès</a></li>
                    </ul>
                </div>
                
                <!-- Barre de recherche centrée avec filtres -->
                <div style="text-align: center; margin-top: 1rem;">
                    <input type="text" placeholder="Rechercher un livre par titre..." 
                           style="padding: 0.5rem; width: 250px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                    
                    <!-- Filtre Catégorie -->
                    <select style="padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; margin-left: 1rem;">
                        <option value="">Catégorie</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="science">Science</option>
                        <option value="histoire">Histoire</option>
                    </select>
                    
                    <!-- Filtre Auteur -->
                    <select style="padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; margin-left: 1rem;">
                        <option value="">Auteur</option>
                        <option value="auteur1">Auteur 1</option>
                        <option value="auteur2">Auteur 2</option>
                        <option value="auteur3">Auteur 3</option>
                    </select>
                    
                    <!-- Filtre Disponibilité -->
                    <select style="padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; margin-left: 1rem;">
                        <option value="">Disponibilité</option>
                        <option value="disponible">Disponible</option>
                        <option value="emprunte">Emprunté</option>
                        <option value="reserve">Réservé</option>
                    </select>
                    
                    <!-- Bouton de recherche -->
                    <button style="padding: 0.5rem 1rem; background-color: #A8D5BA; color: white; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer; margin-left: 1rem;">
                        Rechercher
                    </button>
                </div>
            </nav>
        
            <!-- Contenu principal de la page (par exemple, le bouton "Commencer" qui redirige) -->
            <section class="hero" style="text-align: center; margin-top: 2rem;">
                <div class="hero-content">
                    <h1 style="color: #A8D5BA; font-size: 2.5rem; font-weight: bold;">Crée, gérer et réserver.</h1>
                    <h3 style="color: #2C3E50;">Plus besoin de fouiller dans les archives pour retrouver un livre ou suivre un emprunt : tout est maintenant à portée de clic !</h3>
                    <button class="cta-button" onclick="window.location.href='commencer.html'" style="margin-top: 1rem; padding: 0.75rem 1.5rem; background-color: #75ad8c; color: black; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer;">Commencer</button><br/>
                    <span style="color:#747373;"><small><small><i>Aucun moyen de paiement nécessaire</i></small></small></span>
                </div>
            </section>
        </body>        
    
<section id="about" class="about">
    <section id="about" class="about">
        <div class="about-content">
            <div class="text-content">
                <span style="color: #A8D5BA;"><h1>Bienvenue dans votre espace de gestion de bibliothèque moderne !</h1></span>
                <p>Fini les registres papier et les tâches fastidieuses ! Cette application simplifie et accélère la gestion de notre bibliothèque, rendant chaque opération plus fluide et sans erreurs. Accédez facilement au catalogue, suivez les emprunts en temps réel et gérez les utilisateurs en un clic. <b>Une solution moderne pour une gestion efficace et sans stress de vos livres et emprunts.</b></p>
            </div>
            <img src="C:\Users\jasar\Downloads\3-removebg-preview.png" alt="Collaboration" class="hero-image">
        </div>
    </section>
    <section id="features" class="features">
        <span style="color: #A8D5BA;"><h2>Fonctionnalités</h2></span>
        <div class="features-container">
            <div class="feature-item">
                <img src="C:\Users\jasar\Downloads\5-removebg-preview.png" alt="Suivi de projet">
                <span style="color: #75ad8c;"><h3> Accédez facilement à notre catalogue</h3></span>
                <p>Découvrez en un clin d'œil les livres disponibles et ceux qui sont déjà empruntés.</p>
            </div>
            <div class="feature-item">
                <img src="C:\Users\jasar\Downloads\6-removebg-preview.png" alt="Communication">
                <span style="color: #75ad8c;"><h3>Suivez les emprunts et les retours</h3></span>
                <p>D'un seul coup d'œil, gardez la trace de chaque ouvrage emprunté.</p>
            </div>
            <div class="feature-item">
                <img src="C:\Users\jasar\Downloads\4-removebg-preview.png" alt="Rapports">
                <span style="color: #75ad8c;"><h3>Recherche et réservation ultra-rapides !</h3></span>
                <p>Recherchez des livres en quelques secondes et réservez-les sans attendre.</p>
            </div>
        </div>
    </section>
    <section id="about" class="about">
        <section id="about" class="about">
            <div class="about-content">
                <div class="text-content">
                <span style="color: #A8D5BA;"><h3>Un accès sécurisé et personnalisé</h3></span>
                <p>Chaque utilisateur dispose de son propre espace sécurisé, avec un accès personnalisé. Vous pouvez gérer vos emprunts, consulter vos réservations et suivre vos historiques de lecture en toute sécurité grâce à une connexion protégée. </p><br/>
                <img src="C:\Users\jasar\Downloads\7-removebg-preview.png" alt="Collaboration" class="hero-image">
                <p>Grâce à une connexion protégée, vos informations sont en sécurité à tout moment.</p>
             </div>
        </section>
    <section id="about" class="about">
        <section id="about" class="about">
            <div class="about-content">
                <div class="text-content">
                    <span style="color: #A8D5BA;"><h3>Une bibliothèque à portée de main, où que vous soyez</h3></span>
                    <p> Accédez à notre catalogue en ligne à tout moment et depuis n'importe quel appareil. Que vous soyez au bureau, à la maison ou en déplacement, la gestion de votre bibliothèque se fait en toute simplicité, directement sur votre smartphone, tablette ou ordinateur.</p>
                </div>
                <img src="C:\Users\jasar\Downloads\what_is_test_coverage-removebg-preview.png" alt="Collaboration" class="hero-image">
            </div>
        </section>
        
        <section id="about" class="about">
            <section id="about" class="about">
                <div class="about-content">
                    <div class="text-content">
                        <span style="color: #A8D5BA;"><h2>Une solution innovante pour réinventer votre expérience de bibliothèque</h2></span>
                        <h3> Que vous soyez un lecteur passionné ou un bibliothécaire organisé, notre plateforme vous offre une expérience personnalisée et sans tracas, adaptée à vos besoins et à vos attentes. Une manière innovante de gérer vos livres, sans effort et avec une efficacité maximale.</h3>
                        <button class="cta-button">Commencez dès maintenant ! </button><br/>
                        <span style="color:#747373;"><small><small><i>Aucun moyen de paiement nécessaire</i></small></small></span>
                    </div>
                </div>
            </section>
</body>
</html>