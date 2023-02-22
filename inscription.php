<?php


session_start();

    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    // var_dump($_POST);
    
    $bdd= new mysqli("localhost", "root", "root", "moduleconnexion");
   if( $mysqli->connect_error ) {
        echo "erreur de connexion a MySQL:" .$mysqli -> connect_error;
        exit();
    }

    
    if (isset($_POST['login'],$_POST['prenom'], $_POST['nom'],$_POST['password'],$_POST['confirm-password'])) {
       
        if (empty($_POST['login']) || empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['password']) || empty($_POST['confirm-password'])) 
        {
           
            echo "Vous n'avez pas rempli tous les champs!";

        } 
        
        elseif ($_POST['password'] != $_POST['confirm-password']) 
        
        { 
           echo "Mot de passe différent!";
            
        }

        elseif (mysqli_num_rows(mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login='" . $_POST['login'] . "'" ))==1)
        {
            echo "Ce login est déjà utilisé!";
        }

        
        
         else {
            $query= $bdd->query("INSERT INTO `utilisateurs`( login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')");
        
     
        header("location: connexion.php");
        }
    
    
    
    
    
    
    
    
    
    
     
}




?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">


</head>
<body>

    <header>
        <a href="index.php">Accueil</a>
        <a href="connexion.php">Se connecter</a>
        <a href="inscription.php">Créer compte</a>

    </header>

    <h1>Inscription</h1>
    
<div class="container">
    <form method="post">

    <label for="login" >Login:</label>
    <input type="text" name="login">
    
    
    <label for="Prenom">Prénom:</label>
    <input type="text" name="prenom"> 
    
    <label for="nom">Nom:</label>
    <input type="text" name="nom"> 
    
    <label for="Password">Password:</label>
     <input class="mdp" type="password" name="password"> 
    
    <label for="Confirm-Password">Confirm Password:</label>
    <input class="mdp" type="password" name="confirm-password">

    <input type="submit" value="Créer">

</form>
</div>

</body>
</html>

<!-- <style>

header {
    font-family: 'Fredoka One', cursive;
    font-size: 150%;
    display: flex;
    gap: 30px;
    justify-content: end;
}

.container {
 width: 150px;
 margin: auto; 
 margin-top: 5%;
 
}

input {
    margin-bottom: 5px;
    display: block;

}

a {
    color: white;
    text-decoration: none;
}

a:hover
{
    color: black;
}

body {
    background-image: url(sunset.png);
    background-size: cover;
}

h1{
    font-family: 'Lilita One', cursive;
    width: 150px;
 margin: auto; 
 margin-top: 5%;
}

.mdp
{
background-color: #adad85;

}

input[type=submit] {
 background-color: wheat;
 color: black;
 padding: 5px 20px;
 margin: 15px 45px;
 cursor: pointer;
 width: 50%;
}

input[type=password]
{
    border: none;
}

</style> -->