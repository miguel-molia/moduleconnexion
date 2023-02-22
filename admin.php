<?php

//j'ouvre une session
session_start();
$mysqli = new mysqli("localhost", "root", "root", "moduleconnexion");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}

    //j'effectue ma requete 
   $request = $mysqli->query("SELECT * FROM `utilisateurs` ");
    
   //je recupere les resultats 
   $results = $request->fetch_array(MYSQLI_ASSOC);
    // var_dump($results);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page admin</title>
</head>
<body>
<header>
        <a href="logout.php">Déconnexion</a>
        

</header>
    

    <div class="tableauu">

    <?php



        //j'affiche les resultats sous forme de tableau
        echo "<table>";
    
        echo "<tr>";
    
        foreach ($results as $key => $value)
            {
            echo " <th> " . $key . " </th> ";
            }
            echo "</tr>";
            while ($results != NULL)
            {
            echo "<tr>";
            foreach ($results as $value)
            {
                    echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
            $results = $request -> fetch_array(MYSQLI_ASSOC);
        }
        echo "</table>";
    ?>

</div>

</body>

</html>





