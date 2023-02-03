<?php


session_start(); 

var_dump($_SESSION);

if(isset($_SESSION['login'])) {
        
            echo '<header>
                
                
            <div class="welcome">  Hello'. ' ' . $_SESSION["login"] .' ' . '!☺️ </div>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Déconnexion</a>
        
        </header>';

    } else {
        echo "<header>
        
        <a href='index.php'>Accueil</a>
            <a href='connexion.php'>Se connecter</a>
            <a href='inscription.php'>Créer compte</a>
        </header>";
    
    }
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


    <main>

        <p>
        <div class="monsite">
        BIENVENUE SUR MON SITE 
        </div>
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

.monsite

{
    font-family: 'Lilita One', cursive;
    font-size: 70px;
    padding: 280px 0px 0px 400px;
    
}

.welcome

{
    font-family: 'Lilita One', cursive;
    font-size: 150%;
        
    
}


</style>