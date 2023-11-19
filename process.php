<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Log the submission to a text file
    $log = "submissions.log";
    $log_data = date("Y-m-d H:i:s") . " - Name: $name, Email: $email, Message: $message\n";
    file_put_contents($log, $log_data, FILE_APPEND);

    // Replace 'your_email@example.com' with your actual email address
    $to = "your_email@example.com";
    $subject = "New Application from SN Academy";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Construct the email message
    $email_message = "New application received from $name:\n\n$message";

    // Send the email
    mail($to, $subject, $email_message, $headers);

    // Redirect to a thank you page
    header("Location: thank-you.html");
    exit();
}
?>
