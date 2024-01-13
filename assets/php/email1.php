<?php

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Validate data (you may add more validation as needed)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all the required fields.";
        exit;
    }
    
    // Set recipient email address (replace with your own email)
    $to = "your@example.com";
    
    // Create email headers
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";
    
    // Construct the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message";
    
    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
    
} else {
    // If the form is not submitted using POST method, redirect to the home page or display an error message.
    echo "Invalid request. Please submit the form from the website.";
}

?>