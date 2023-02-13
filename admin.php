<?php
session_start();
$mysqli = new mysqli("localhost:3306", "miguel-molia", "Laplateforme24", "miguel-molia_moduleconnexion");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}
   $request = $mysqli->query("SELECT * FROM `utilisateurs` ");
    $results = $request->fetch_array(MYSQLI_ASSOC);
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
    
    <?php
        echo "<table>";
    
    
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

</body>
</html>


<style>
    
    body {
    background-image: url(sunset2.png);
    background-size: cover;
    }

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
    
table

{
    border-collapse: collapse;
    border: solid;
}

th, td
{
    border: solid;
}
    
    </style>
