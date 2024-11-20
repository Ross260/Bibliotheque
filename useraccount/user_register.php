
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="inscri.css">
    <title>BiblioSmart</title>
</head>

<body>
    
    <div class="wrapper">

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- login form -------------------------->

            <div class="login-container" id="login"> 
                <header class="main-header">
                    <h2>BiblioSmart</h2>
                </header>
                <div class="top">
                    <span>Vous n'avez pas de compte? <a href="#" onclick="register()">S'inscrire</a></span>
                    <header>Se connecter</header>
                </div>


                <form method="POST" action="connexion.php">
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="mdp" class="input-field" placeholder="Mot de passe" required>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit"  name= "bout" value="Se connecter">
                    </div>
                </form>
                
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Se souvenir de moi</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Mot de passe oublié?</a></label>
                    </div>
                </div>
            </div>

            <!------------------- registration form -------------------------->

            <div class="register-container" id="register">
                <form method="POST" action="inscription.php">
                    <div class="input-box">
                        <input type="text" name="nom" class="input-field" placeholder="Nom" required>
                    </div>
                    <div class="input-box">
                        <input type="text" name="prenom" class="input-field" placeholder="Prénom" required>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="email" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="mdp" class="input-field" placeholder="Mot de passe" required>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" name = "bout" value="S'inscrire" >
                    </div>
                </form>
                
                <div class="top">
                    <span>Vous avez déjà un compte? <a href="#" onclick="login()">Se connecter</a></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function login() {
            document.getElementById("login").style.left = "4px";
            document.getElementById("register").style.right = "-520px";
        }

        function register() {
            document.getElementById("login").style.left = "-510px";
            document.getElementById("register").style.right = "5px";
        }
    </script>
</body>

</html>
