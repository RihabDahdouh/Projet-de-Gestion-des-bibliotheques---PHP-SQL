<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styletable.css"> 
    <link rel="stylesheet" href="stylemoncv.css">
</head>
    
</head>
<body>
    

<h2 class="tit">liste des livres</h2>
    <div class="container">
    <table>
        <tr>
            <th> ISBN</th>
            <th> Titre</th>
            <th> Auteur</th>
            <th> image</th>
            
        </tr>
        
            <?php
            include("connexion.php");
            
                $sql2 = "SELECT * FROM livre ";
                $result2 = mysqli_query($link, $sql2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>" . $data2['isbn'] . "</td>";
                    echo "<td>" . $data2['titre_livre'] . "</td>";
                    echo "<td>" . $data2['auteur'] . "</td>";
                    echo "<td><p><img src=image/" . $data2['image_livre'] . "></p></td>";
                    echo "</tr>";
                }
            
            ?>
    </table>

    </body>
</html>