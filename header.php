<?php

//j'ouvre une session
session_start();


//si le login existe
if (isset($_SESSION['login'])) 
{
    echo '<a href=".index.php">Accueil</a>';
    echo '<a href="profil.php">Profil</a>';
    
    //si le login est "admin"
    if ($_SESSION['login'] == 'admin') 
    {
        echo '<a href="admin.php">Admin</a>';
    }
    echo '<a href="logout.php"></a>';
} 
//sinon
else 
{
    echo '<a href="index.php">Accueil</a>';
    echo '<a href="connexion.php">Se connecter</a>';
    echo "<a href='inscription.php'>Créer compte</a>";
}




?>