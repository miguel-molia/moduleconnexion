<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <a href="index.php">Accueil</a>
        <a href="inscription.php">Créer compte</a>

    </header>
    
    <?php var_dump($_SESSION); ?>

    <form action="" method="POST">
    <h1>Modifiez vos informations</h1>
    
    <div class="container">

    <label><b>Modifier nom</b></label>
    <input type="text" name="nom" placeholder=<?php echo $_SESSION['nom'];?> >
    <label><b>Modifier prénom</b></label>
    <input type="text" name="prenom" placeholder=<?php echo $_SESSION['prenom'];?> >
    <label><b>Modifier login</b></label>
    <input type="text" name="login" placeholder=<?php echo $_SESSION['login'];?> >
    <label><b>Modifier mot de passe</b></label>
    <input type="password" name="password" placeholder=<?php echo $_SESSION['password'];?> >
    <label for="confirm_password"><b>Confirmer le Password</b></label>
    <input type="password" name="confirm_password" class="form-control form-control-lg" id="confirm_password">
    <input type="submit" id='submit' value="MODIFIER" name="submit" >
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

.container {
 width: 150px;
 margin: auto; 
 margin-top: 5%;
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
 width: 72%;
}

</style>