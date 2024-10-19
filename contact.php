<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les données du formulaire
  $nom = htmlspecialchars($_POST['nom']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  
  // Validation basique
  if (!empty($nom) && !empty($email) && !empty($message)) {
    // Configurer les détails de l'email
    $to = "tonemail@exemple.com";  // Remplace par ton adresse email
    $subject = "Nouveau message de contact de $nom";
    $body = "Nom: $nom\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";
    
    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
      echo "Votre message a bien été envoyé !";
    } else {
      echo "Erreur lors de l'envoi du message.";
    }
  } else {
    echo "Tous les champs sont obligatoires.";
  }
}
?>
