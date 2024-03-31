<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Adresse e-mail où vous souhaitez recevoir le formulaire
    $to = "patrick.veillon@gmail.com";

    // Sujet de l'e-mail
    $email_subject = "Nouveau message de $name : $subject";

    // Corps de l'e-mail
    $email_body = "Vous avez reçu un nouveau message via le formulaire de contact :\n\n";
    $email_body .= "Nom: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Sujet: $subject\n";
    $email_body .= "Message:\n$message";

    // En-têtes de l'e-mail
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Envoi de l'e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Si l'e-mail est envoyé avec succès
        echo "Votre message a bien été envoyé.";
    } else {
        // Si l'e-mail n'a pas pu être envoyé
        echo "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer.";
    }
} else {
    // Si la méthode de requête n'est pas POST, rediriger vers la page du formulaire
    header("Location: contact.php");
    exit();
}
?>
