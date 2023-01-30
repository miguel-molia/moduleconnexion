<?php
session_start();

$host = "localhost";
$user = "root";
$password = "root";
$database = "moduleconnexion";

$login = $_POST["login"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$password2 = $_POST["password"];

$connect = mysqli_connect($host, $user, $password, $database);

$var = mysqli_query($connect, " SELECT * FROM utilisateurs WHERE login ='$login'  AND password = '$password2' ");


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    
</head>
<body>

    <header>
        
         
          <div class="welcome">  Hello <?= $_SESSION["login"]?> !☺️ </div>
            <a href="index.php">Accueil</a>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Déconnexion</a>
        
    </header>


    <main>

        <p>
        
          
        
        </p>


    </main>
    

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

.welcome

{
    font-family: 'Lilita One', cursive;
    font-size: 150%;
        
    
}



</style>