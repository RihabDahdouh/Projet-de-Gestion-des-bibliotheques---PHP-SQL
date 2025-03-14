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
    <div class="title"><h2>Etudiant</h2></div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="input-container ic1">
        <input id="firstname" class="input" type="text" name="apogee" placeholder=" " />
        <div class="cut"></div>
        <label for="login" class="placeholder">Num apogee</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" class="input" type="text" name="nom" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Nom</label>
      </div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="text" name="prenom" placeholder=" " />
        <div class="cut"></div>
        <label for="prenom" class="placeholder">prenom</label>
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
        $apogee = $_POST['apogee'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
            $dossier = 'photo/';
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
            $nom_photo = $apogee . "." . $extension_upload; // change the $user to take the login
            if (!move_uploaded_file($nom_tmp, $dossier . $nom_photo)) {
                exit("Problem dans le telechargement de l'image, Ressayez");
            }
            $ph_name = $nom_photo;
        } else {
            $ph_name = "SANS_IMAGE.png";
        }

        // Ajouter une nouvelle experience pour l'etudiant
        $requette = "INSERT INTO `etudiant`(`num_apogee`, `nom`, `prenom`, `image`) VALUES ('$apogee','$nom','$prenom','$ph_name')";
        $resultat = mysqli_query($link, $requette);
        header('location: liste_etudiants.php');
    }
}
?>


</body>
</html>