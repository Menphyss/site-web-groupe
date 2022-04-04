<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librairie De Fou</title>
    <link rel="icon" type="image/png" href="./img/logo.png" />
    <link rel="stylesheet" href="css/mainStyle.css">
    <link rel="stylesheet" href="css/gameList.css">
    <link rel="stylesheet" href="css/svgStyle.css">
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/groupe.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta property="og:title" content="Le site de fou" />
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Viens voir">
    <meta property="og:image:width" content="767">
    <meta property="og:image:height" content="767">
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + c'est pour crypté le mot de passe 
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Félicitation, vous êtes bien inscrit</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><a >Librairie</a></h1>
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register"><a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>