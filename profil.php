<?php 

session_start(); 

$host = "localhost";
$user= "root";
$password= "root";
$database = "moduleconnexion";

// connexion à la BDD
$connect = mysqli_connect($host, $user, $password, $database);

//on verifie que la session existe 
if (empty($_SESSION)) {
    header('location:index.php');
    exit();
}

?>





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
<link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
    <div class="welcome"> <?= $_SESSION["login"] ?> </div>
        <a href="index.php">Accueil</a>
        <a href="logout.php">Déconnexion</a>

    </header>
    
    <h1>Modifier profil</h1>

<div class="block">
    <div class="container2">

        <a href="./modifier_login.php">Modifier login</a>

        <a href="./modifier_password.php">Modifier password</a>

    </div>

</div>


    <!-- <form action="" method="POST">
    <h1>Modifiez vos informations</h1>
    
    <div class="container">

    <label><b>Modifier nom</b></label>
    <input type="text" name="modif_nom" value="<?= $_SESSION["nom"]; ?>" >
   
    <label><b>Modifier prénom</b></label>
    <input type="text" name="modif_prenom" value="<?= $_SESSION["prenom"]; ?>">
   
    <label><b>Modifier login</b></label>
    <input type="text" name="modif_login" value="<?= $_SESSION["login"]; ?>" >
   
    <label><b>Modifier password</b></label>
    <input type="password" name="modif_password" >
   
    <label for="confirm_password"><b>Confirmer password</b></label>
    <input type="password" name="confirm_password">
   
    <input type="submit" value="valider" name="submit" >
    </form>

    </div> -->

</body>
</html>

<?php




if (isset($_POST['modif_prenom'], $_POST['modif_nom'], $_POST['modif_login'], $_POST['modif_password'], 
$_POST['confirm_password'])) 

{
    if (!empty($_POST["modif_prenom"])) {
        $request = $connect->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");

        $request->bind_param('si', $_POST['modif_prenom'], $_SESSION['id']);

        $request->execute();
    }



    elseif (!empty($_POST["modif_nom"])) {
        $request = $connect->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");

        $request->bind_param('si', $_POST['modif_nom'], $_SESSION['id']);

        $request->execute();
    }



    elseif (!empty($_POST["modif_login"])) {
        $request = $connect->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");

        $request->bind_param('si', $_POST['modif_login'], $_SESSION['id']);

        $request->execute();
    }


    elseif (!empty($_POST['modif_password']) && !empty($_POST['modif_password'])) {
        if ($_POST['modif_password'] == $_POST['confirm_password'])

            $request = $connect->prepare("UPDATE utilisateurs SET password= ? WHERE id = ?");

        $request->bind_param('si', $_POST['modif_password'], $_SESSION['id']);

        $request->execute();
    }


    //ok on vérfie si ils sont pas vides 
    elseif (!empty($_POST['modif_prenom']) && !empty($_POST['modif_nom']) && !empty($_POST['modif_login']) 
    &&  !empty($_POST['modif_password']) && !empty($_POST['confirm_password'])) {



        //on verifie que ton modif_password et ton confirm_password sont identiques
        if ($_POST['modif_password'] == $_POST['confirm_password']) {
            //requete Update 


            //je prepare ma requete pour mettre a jour un utilisateur dans          
            $request = $connect->prepare("UPDATE utilisateurs SET prenom = ?, nom = ?, login = ?, password= ? WHERE id = ?");

            //je defini mes parametres (valeurs aux ?)
            $request->bind_param('ssssi',$_POST['modif_prenom'], $_POST['modif_nom'], $_POST['modif_login'], $_POST['modif_password'], 
            $_SESSION['id']);
            //j'execute ma requete
            $request->execute();
        }
    }




    $requestUser = $connect->query("SELECT id, login FROM utilisateurs WHERE id = $_SESSION[id]");
    // $requestUser = $connect->query("SELECT * FROM utilisateurs");


    //je vais chercher (fetch) sous forme de tableau
    $user = $requestUser->fetch_array(MYSQLI_ASSOC);



    //modif $_SESSION 
    $_SESSION['login'] = $user['login'];
    //  var_dump($user);

}

if (!empty($_POST['modif_prenom']) && !empty($_POST['modif_nom']) && !empty($_POST['modif_login']) && empty($_POST['modif_password']) 
    && empty($_POST['confirm_password']))

    {
        echo "<div class= 'echo'> Veuillez renseignez tous les champs du mot de passe! </div>";
    }

    elseif ($_POST['modif_password'] != ($_POST['confirm_password']))

    {
        echo "<div class= 'echo'> mot de passe différents!</div>";
    }






?>




<!-- <style>

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

</style> -->