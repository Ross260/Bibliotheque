<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>

<style>
    
    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-align: center;
    background-color: #F0E6D2;
    color: #2C3E50; 
}

.login-button {
    background-color: #75ad8c;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 5px;
    color: #2C3E50;
}

.hero{
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 2rem;
    background-image: url('images_livres/fisrt_image.png');
    flex-wrap: wrap;
    color: #2C3E50;
 
}

.hero-content {
    max-width: 50%;
}

.hero-image {
    max-width: 45%;
    border-radius: 10px;
}

.cta-button {
    background-color: #75ad8c;
    color: white;
    padding: 1rem 2rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.features {
    padding: 2rem;
    background-color: #F0E6D2;
    color: #2C3E50;
}

.features-container {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.feature-item {
    text-align: center;
    max-width: 30%;
}

.feature-item img {
    width: 100%;
    border-radius: 5px;
}

.about, .contact {
    padding: 2rem;
    background-color: #F0E6D2;;
    text-align: center;
    color: #2C3E50;
}

#contact-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

#contact-form label {
    font-weight: bold;
}

#contact-form input, #contact-form textarea {
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#contact-form button {
    background-color: #75ad8c;
    color: white;
    padding: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}


section {
  background: #F0E6D2;;
  color: #F0E6D2;
  min-height: 85vh;
  font-size: 27px;
  color: #2C3E50;
}

.about-content {
    display: flex;
    align-items: flex-start; /* Aligne les éléments en haut */
    justify-content: space-between;
}

.text-content {
    flex: 1;
    margin-right: 20px;
}

.hero-image {
    flex: 1;
    max-width: 40%; /* Ajustez cette valeur selon vos besoins */
    height: auto;
}
header {
    width: 100%;
    background-color: #ecddbd;
    padding: 1px; /* Un peu d'espace au-dessus et en-dessous */
}

nav {
    display: flex;
    justify-content: center; /* Centrer horizontalement */
    align-items: center; /* Centrer verticalement */
    height: 100px; /* Ajustez la hauteur de votre header */
}

.site-name {
    color: #FFF; /* Couleur choisie */
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
}


</style>

<body>
 
 
        <header>
            <nav style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; background-color: #F0E6D2; width: 100%; box-sizing: border-box; position: fixed;">
                <!-- Nom du site bien centré -->
                <div class="site-name" style="position: absolute; left: 10%; transform: translateX(-50%); font-size: 1.5rem; font-weight: bold; color: black;">
                    BiblioSmart
                </div>
                <!-- Bouton à droite -->
                <button class="cta-button" onclick="window.location.href='commencer.html'" style="margin-left: auto; padding: 0.75rem 1.5rem; background-color: #75ad8c; color: black; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer;">Connexion</button>
            </nav>
                         
        </header>        
            <!-- Contenu principal de la page (par exemple, le bouton "Commencer" qui redirige) -->
            <section class="hero" style="text-align: center; margin-top: 2rem;">
                <div class="hero-content">
                    <h1 style="color: #FFF; font-size: 2.5rem; font-weight: bold;">Crée, gérer et réserver.</h1>
                    <h3 style="color: #FFF;">Plus besoin de fouiller dans les archives pour retrouver un livre ou suivre un emprunt : tout est maintenant à portée de clic !</h3>
                </div>
            </section>
              
    

    <section id="about" class="about">
        <div class="about-content">
            <div class="text-content">
                <span style="color: #A8D5BA;"><h1>Bienvenue dans votre espace de gestion de bibliothèque moderne !</h1></span>
                <p>Fini les registres papier et les tâches fastidieuses ! Cette application simplifie et accélère la gestion de notre bibliothèque, rendant chaque opération plus fluide et sans erreurs. Accédez facilement au catalogue, suivez les emprunts en temps réel et gérez les utilisateurs en un clic. <b>Une solution moderne pour une gestion efficace et sans stress de vos livres et emprunts.</b></p>
            </div>
            <img src="images_livres/3-removebg-preview.png" alt="Collaboration" class="hero-image">
        </div>
    </section>
    <section id="features" class="features">
        <span style="color: #A8D5BA;"><h2>Fonctionnalités</h2></span>
        <div class="features-container">
            <div class="feature-item">
                <img src="images_livres/5-removebg-preview.png" alt="Suivi de projet">
                <span style="color: #75ad8c;"><h3> Accédez facilement à notre catalogue</h3></span>
                <p>Découvrez en un clin d'œil les livres disponibles et ceux qui sont déjà empruntés.</p>
            </div>
            <div class="feature-item">
                <img src="images_livres/6-removebg-preview.png" alt="Communication">
                <span style="color: #75ad8c;"><h3>Suivez les emprunts et les retours</h3></span>
                <p>D'un seul coup d'œil, gardez la trace de chaque ouvrage emprunté.</p>
            </div>
            <div class="feature-item">
                <img src="images_livres/4-removebg-preview.png" alt="Rapports">
                <span style="color: #75ad8c;"><h3>Recherche et réservation ultra-rapides !</h3></span>
                <p>Recherchez des livres en quelques secondes et réservez-les sans attendre.</p>
            </div>
        </div>
    </section>

        <section id="about" class="about">
            <div class="about-content">
                <div class="text-content">
                <span style="color: #A8D5BA;"><h3>Un accès sécurisé et personnalisé</h3></span>
                <p>Chaque utilisateur dispose de son propre espace sécurisé, avec un accès personnalisé. Vous pouvez gérer vos emprunts, consulter vos réservations et suivre vos historiques de lecture en toute sécurité grâce à une connexion protégée. </p><br/>
                <img src="images_livres/7-removebg-preview.png" alt="Collaboration" class="hero-image">
                <p><b>Grâce à une connexion protégée, vos informations sont en sécurité à tout moment.</b></p>
             </div>
        </section>

        <section id="about" class="about">
            <div class="about-content">
                <div class="text-content">
                    <span style="color: #A8D5BA;"><h3>Une bibliothèque à portée de main, où que vous soyez</h3></span>
                    <p> Accédez à notre catalogue en ligne à tout moment et depuis n'importe quel appareil. Que vous soyez au bureau, à la maison ou en déplacement, la gestion de votre bibliothèque se fait en toute simplicité, directement sur votre smartphone, tablette ou ordinateur.</p>
                </div>
                <img src="images_livres/EXPLOERA__5_-removebg-preview.png" alt="Collaboration" class="hero-image">
            </div>
        </section>
        

            <section id="about" class="about">
                <div class="about-content">
                    <div class="text-content">
                        <span style="color: #A8D5BA;"><h2>Une solution innovante pour réinventer votre expérience de bibliothèque</h2></span>
                        <h3> Que vous soyez un lecteur passionné ou un bibliothécaire organisé, notre plateforme vous offre une expérience personnalisée et sans tracas, adaptée à vos besoins et à vos attentes. Une manière innovante de gérer vos livres, sans effort et avec une efficacité maximale.</h3>
                    </div>
                </div>
            </section>
</body>
</html>