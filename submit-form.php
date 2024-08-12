<?php
// Email configuration
$to = "adebowaleconsult@outlook.com"; // Replace with your email address
$subject = "New Contact Form Submission";

// Retrieve form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

// Basic validation
$errors = [];
if (empty($name)) {
    $errors[] = "Name is required.";
} elseif (!preg_match("/^[A-Za-z\s]+$/", $name)) {
    $errors[] = "Name should only contain letters and spaces.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (empty($message)) {
    $errors[] = "Message is required.";
}

if (!empty($errors)) {
    // Display errors and stop script
    echo "<h2>Form Submission Errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "<a href='contact.html'>Go Back</a>";
    exit;
}

// Prepare the email content
$email_subject = "Contact Form Submission from $name";
$email_body = "Name: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Message:\n$message\n";

// Set headers for the email
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "<h2>Thank you for your message!</h2>";
    echo "<p>We have received your message and will get back to you soon.</p>";
} else {
    echo "<h2>There was a problem with your submission.</h2>";
    echo "<p>We could not send your message. Please try again later.</p>";
}

// Provide a link to return to the contact page
echo "<a href='contact.html'>Go Back</a>";
?>