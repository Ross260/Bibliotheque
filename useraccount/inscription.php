<?php
session_start();
if(isset($_POST['bout'])){
    $id = mysqli_connect("localhost","root","","bibliotheque");
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    
    $req = "INSERT INTO utilisateur (nom,prenom,email,mdp)
                VALUES ('$nom','$prenom','$email','$mdp')";
    $res = mysqli_query($id,$req);
    echo "<h3>Inscruption réussie, connectez vous....";
   
    header("location:user_register.php");
}

?>