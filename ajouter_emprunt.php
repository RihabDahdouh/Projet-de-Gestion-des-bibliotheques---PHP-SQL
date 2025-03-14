<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>

<div class="form">
    <div class="title"><h2>Emprunt</h2></div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="input-container ic1">
        <select class="input" name="etudiant" id="">
        <?php
        include ("connexion.php");
        $sql="SELECT * FROM etudiant";
        $result=mysqli_query($link,$sql);
        while ($liste_etudiant=mysqli_fetch_assoc($result)){
            echo '<option value='.$liste_etudiant["num_apogee"].'>';
            echo $liste_etudiant["nom"]." ".$liste_etudiant["prenom"];
            echo '</option>';
        }
        ?>
        </select>
        <div class="cut"></div>
        <label for="province" class="placeholder">etudiant</label>
    </div>

    <div class="input-container ic1">
        <select class="input" name="livre" id="">
        <?php
        include ("connexion.php");
        $sql="SELECT * FROM livre";
        $result=mysqli_query($link,$sql);
        while ($liste_livre=mysqli_fetch_assoc($result)){
            echo '<option value='.$liste_livre["isbn"].'>';
            echo $liste_livre["titre_livre"];
            echo '</option>';
        }
        ?>
        </select>
        <div class="cut"></div>
        <label for="province" class="placeholder">livre</label>
    </div>

      <div class="input-container ic1">
        <input id="firstname" class="input" type="date" name="dd" placeholder=" " />
        <div class="cut"></div>
        <label for="dd" class="placeholder">date debut</label>
      </div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="date" name="dr" placeholder=" " />
        <div class="cut"></div>
        <label for="dr" class="placeholder">date retour</label>
      </div>
     
      <button type="text" class="submit" name="ajouter">ajouter</button>
      </form>
</div>

<?php 
session_start();
include('connexion.php');
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];

    if (isset($_POST['ajouter'])) {
        $etudiant = $_POST['etudiant'];
        $livre = $_POST['livre'];
        $dated = $_POST['dd'];
        $dater = $_POST['dr'];
    
       
        $sql = "SELECT * FROM gestionaire WHERE login= '".$login."'";
        $result = mysqli_query($link, $sql);
        if($data = mysqli_fetch_assoc($result)){
            $id_gestionaire = $data['id_gestionaire'];
        }


        $sql2 = "INSERT INTO `emprunt`(`id_emprunt`, `id_etudiant`, `id_livre`, `id_gestionaire`, `dt_debut`, `dt_retour`) VALUES ('','$etudiant','$livre','$id_gestionaire','$dated', '$dater')";
        $resultat = mysqli_query($link, $sql2);
        header('location: list_emprunts.php');
    }
}

?>
</body>
</html>