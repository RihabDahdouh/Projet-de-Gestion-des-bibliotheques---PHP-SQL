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
    <div class="title"><h2>Livre</h2></div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="input-container ic1">
        <input id="firstname" class="input" type="text" name="isbn" placeholder=" " />
        <div class="cut"></div>
        <label for="isbn" class="placeholder">ISBN</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" class="input" type="text" name="titre" placeholder=" " />
        <div class="cut"></div>
        <label for="titre" class="placeholder">titre du livre</label>
      </div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="text" name="auteur" placeholder=" " />
        <div class="cut"></div>
        <label for="auteur" class="placeholder">Auteur</label>
      </div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="file" name="image" placeholder=" " />
        <div class="cut"></div>
        <label for="photo" class="placeholder">photo</label>
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
        $isbn = $_POST['isbn'];
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];

        if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
            $dossier = 'image/';
            $nom_tmp = $_FILES['image']['tmp_name']; // nom temporaire du fichier
            if (!is_uploaded_file($nom_tmp)) {
                exit("Le fichier est introuvable");
            }
            if ($_FILES['image']['size'] >= 10000000) {
                exit("Erreur, le fichier est volumineux.");
            }
            $infofichier = pathinfo($_FILES['image']['name']); //takes the file's name
            $extension_upload = $infofichier['extension']; //takes the file's extension (example : png)

            $extension_upload = strtolower($extension_upload);
            $extensions_autorisees = array('png', 'jpeg', 'jpg');
            if (!in_array($extension_upload, $extensions_autorisees)) {
                exit("Erreur, Veuillez inserer une image svp (extensions autorisées)");
            }
            $nom_photo = $isbn . "." . $extension_upload; // change the $user to take the login
            if (!move_uploaded_file($nom_tmp, $dossier . $nom_photo)) {
                exit("Problem dans le telechargement de l'image, Ressayez");
            }
            $ph_name = $nom_photo;
        } else {
            $ph_name = "SANS_IMAGE.png";
        }

        // Ajouter une nouvelle experience pour l'etudiant
        $requette = "INSERT INTO `livre`(`isbn`, `titre_livre`, `auteur`, `image_livre`) VALUES ('$isbn','$titre','$auteur','$ph_name')";
        $resultat = mysqli_query($link, $requette);
        header('location: list_livres.php');
    }
}
?>


</body>
</html>