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
    
<h2 class="tit">liste des Emprunts</h2>
    <div class="container">
    <table>
        <tr>
            <th> id emprunt</th>
            <th> Nom</th>
            <th> Prénom</th>
            <th> titre du livre</th>
            <th> date emprunt</th>
            <th> date retour</th>
            
        </tr>
        
            <?php
            include("connexion.php");
            session_start();
            $login = $_SESSION['login'];
            $sql = "SELECT * FROM gestionaire WHERE login= '".$login."'";
            $result = mysqli_query($link, $sql);
            if($data = mysqli_fetch_assoc($result)){
                $id_gestionaire = $data['id_gestionaire'];
            }

            
            
                $sql2 = "SELECT * FROM emprunt, etudiant, livre WHERE emprunt.id_etudiant=etudiant.num_apogee AND emprunt.id_livre=livre.isbn";
                $result2 = mysqli_query($link, $sql2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>" . $data2['id_emprunt'] . "</td>";
                    echo "<td>" . $data2['nom'] . "</td>";
                    echo "<td>" . $data2['prenom'] . "</td>";
                    echo "<td>" . $data2['titre_livre'] . "</td>";
                    echo "<td>" . $data2['dt_debut'] . "</td>";
                    echo "<td>" . $data2['dt_retour'] . "</td>";
                    echo "</tr>";
                }
            
            ?>
    </table>

    </body>
</html>