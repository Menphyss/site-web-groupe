<?php
  // Démarrer la session
  session_start();
  
  // Fermer la session
  if(session_destroy())
  {
    // Vers la page de connexion
    header("Location: login.php");
  }
?>