<?php 
session_start();
unset($_SESSION['prenom']);
session_destroy();

header('Location: ./index.php');

#fichier de déconexion de l'administrateur