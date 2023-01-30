<?php

session_start();


$host = "localhost";
$user = "root";
$password = "root";
$database = "moduleconnexion";




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


 <?php   $login = $_POST["login"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$password2 = $_POST["password"];

$connect = mysqli_connect($host, $user, $password, $database);

$var = mysqli_query($connect, " SELECT * FROM utilisateurs WHERE login ='$login'  AND password = '$password2' ");
// $var = mysqli_fetch_all($var, MYSQLI_ASSOC);
$num_ligne = mysqli_num_rows($var);



if ($num_ligne > 0)

{

    $_SESSION["login"] = ($_POST["login"]);
    $_SESSION["password"] = $_POST["password"];

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

<style>

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



<?php

