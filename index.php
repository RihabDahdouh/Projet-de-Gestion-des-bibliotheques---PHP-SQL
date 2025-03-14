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
    <div class="title"><h2>Connexion</h2></div>
    <form action="traitement_index.php" method="get">
    <div class="input-container ic1">
        <input id="firstname" class="input" type="text" name="login" placeholder=" " />
        <div class="cut"></div>
        <label for="login" class="placeholder">login</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" class="input" type="password" name="password" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Password</label>
      </div>
      <button type="text" class="submit" name="seconnecter">submit</button>
        
    </form>
</div>

    
</body>
</html>