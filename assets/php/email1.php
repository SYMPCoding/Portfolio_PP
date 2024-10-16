<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validation (basic)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Sanitize email and check if it's valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare the email
    $to = "your-email@example.com";  // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $email_subject = "Contact Form: $subject";
    $email_body = "
    <html>
    <body>
        <h2>New Message from Contact Form</h2>
        <p><strong>Name: </strong> $name</p>
        <p><strong>Email: </strong> $email</p>
        <p><strong>Subject: </strong> $subject</p>
        <p><strong>Message: </strong><br> $message</p>
    </body>
    </html>";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
