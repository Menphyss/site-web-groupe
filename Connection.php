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
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">Librairie</a></h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</body>
</html>