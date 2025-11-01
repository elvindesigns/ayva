<?php
// sendmail.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Validate
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p style='color:red;'>All fields are required.</p>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Invalid email format.</p>";
        exit;
    }

    // Recipient
    $to = "info@ayvaconsults.com";

    // Subject
    $email_subject = "New Contact Form: $subject";

    // Message
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<p style='color:green; font-weight:bold;'>Thank you! Your message has been sent.</p>";
    } else {
        echo "<p style='color:red;'>Oops! Something went wrong. Please try again later.</p>";
    }
}
?>