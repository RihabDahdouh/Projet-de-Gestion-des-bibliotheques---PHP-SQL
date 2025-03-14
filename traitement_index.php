<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include("connexion.php");
    $login = $_GET["login"];
    $password = $_GET["password"];
    if (isset($_GET['seconnecter'])) {
        if (empty($login) or empty($password)) {
            header("Location: login_error.php");
        } else {
            $sql = "SELECT * FROM `gestionaire` WHERE login= '" . $login . "' ";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['pass'] == $password) {
                session_start();
                $_SESSION['login'] = $row['login'];
                header("Location: menu.php");
            } else {
            echo 'votre login ou mot de passe est incorrect';
            }
        }
    }

    
     ?>
    
</body>
</html>