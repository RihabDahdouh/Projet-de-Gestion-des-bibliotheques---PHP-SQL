<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styletable.css"> 
</head>
    
</head>
<body>
    
<h2 class="tit">liste des Etudiants</h2>
    <div class="container">
    <table>
        <tr>
            <th> Numéro apogée</th>
            <th> Nom</th>
            <th> Prénom</th>
            <th> Photo</th>
            
        </tr>
        
            <?php
            include("connexion.php");
                $sql2 = "SELECT * FROM etudiant ";
                $result2 = mysqli_query($link, $sql2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>" . $data2['num_apogee'] . "</td>";
                    echo "<td>" . $data2['nom'] . "</td>";
                    echo "<td>" . $data2['prenom'] . "</td>";
                    echo "<td><p><img src=photo/" . $data2['image'] . "></p></td>";
                    echo "</tr>";
                }
            
            ?>
    </table>

    </body>
</html>