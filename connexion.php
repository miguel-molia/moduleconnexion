<?php
//j'ouvre une session
session_start();

// j'attribue des variables aux differents parametres pour me connecter a la base de donnée
$host = "localhost";
$user = "root";
$password = "root";
$database = "moduleconnexion";


//si la session n'est pas vide (si on est connecté) rediriger vers page d'accueil
if (!empty($_SESSION)){
    header('location: index.php');
}

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    
    <h1>Connexion</h1>

<div class="container">
<form method="post" action="connexion.php"> 

    <label for="Login" >Login:</label>
    <input name="login" type="text" placeholder="Entrer le nom d'utilisateur">

    <label for="Password" >Password:</label>
    <input name="password" type="password" placeholder="Entrer le mot de passe"> 

    <input type="submit" value="Connexion">

<?php   

//j'attribue une variable au login que je recupere dans le formulaire
$login = $_POST["login"];

//j'attribue une variable au mot de passe que je recupere dans le formulaire
$password2 = $_POST["password"];

//je me connecte à la base de donnée
$connect = mysqli_connect($host, $user, $password, $database);

//j'effectue ma requete en selectionnant chaque login et mot de passe
$var = mysqli_query($connect, " SELECT * FROM utilisateurs WHERE login ='$login'  AND password = '$password2' ");

// Je recupere les donnees que j'ai demandé dans la requete (fetch = recuperer, j'affiches pas, pour afficher
// il faut le mettre dans un tableau)
$fetchUser = mysqli_fetch_all($var, MYSQLI_ASSOC);

//Je compte le nombre de rangées dans la base de donnée
$num_ligne = mysqli_num_rows($var);


//si le nombre est superieur à 0, c'est à dire si au moins un utilisateur existe
if ($num_ligne > 0)

{   
    //
    $_SESSION['id'] = $fetchUser[0]["id"];
    $_SESSION['prenom'] = $fetchUser[0]["prenom"];
    $_SESSION['nom'] = $fetchUser[0]["nom"];
    
    //j'associe les 
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["password"] = $_POST["password"];
    var_dump($num_ligne);


    if ($_SESSION["login"] == "admin" && $_SESSION["password"] == "admin")

    {
        header("location: admin.php");
    }

    else {
        header("location: sessionouverte.php") ; 
    }

}


elseif (isset($_POST["login"]) && isset($_POST["password"]) && $num_ligne == 0)

{
    echo "<p class= 'echo'>login ou mot de passe incorrect!</p>";
}

?>

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

input {
    display: flex;
    justify-content: center;
}

h1{
    font-family: 'Lilita One', cursive;
    width: 150px;
 margin: auto; 
 margin-top: 5%;
}

input[type=submit] {
 background-color: wheat;
 color: black;
 padding: 5px 20px;
 margin: 15px 45px;
 cursor: pointer;
 width: 50%;
}

.echo
{
    font-family: 'Lilita One', cursive;
    width: 150px;
 margin: auto; 
 margin-top: 5%;
 color: red;
}


</style>
 -->


<?php

