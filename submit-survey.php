<?php
// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php';

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $favoriteCoffee = htmlspecialchars(trim($_POST["favorite-coffee"]));
    $coffeeStyle = htmlspecialchars(trim($_POST["coffee-style"]));
    $preferredCaffeine = htmlspecialchars(trim($_POST["preferred-caffeine"]));
    $satisfaction = htmlspecialchars(trim($_POST["satisfaction"]));
    $comments = htmlspecialchars(trim($_POST["comments"]));

    // Validate required fields
    if (empty($name) || empty($email) || empty($favoriteCoffee) || empty($coffeeStyle) || empty($preferredCaffeine) || empty($satisfaction)) {
        echo "All required fields must be filled out.";
        exit;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                    // Set mailer to use SMTP
        $mail->Host       = 'smtp.example.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                           // Enable SMTP authentication
        $mail->Username   = 'your-email@example.com';       // SMTP username
        $mail->Password   = 'your-email-password';          // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                            // TCP port to connect to

        // Recipients
        $mail->setFrom('no-reply@yourdomain.com', 'Coffee Shop');
        $mail->addAddress('adebowaleconsult@outlook.com');   // Add a recipient

        // Content
        $mail->isHTML(false);                               // Set email format to HTML
        $mail->Subject = "Coffee Survey Response from $name";
        $mail->Body    = "Name: $name\n" .
                         "Email: $email\n" .
                         "Favorite Coffee: $favoriteCoffee\n" .
                         "Coffee Style: $coffeeStyle\n" .
                         "Preferred Caffeine: $preferredCaffeine\n" .
                         "Satisfaction: $satisfaction\n" .
                         "Comments: $comments\n";

        // Send email
        $mail->send();
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Survey Submission Confirmation</title>
            <link rel='stylesheet' href='styles.css'>
            <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>
            <style>
                body {
                    font-family: 'Roboto', sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                header {
                    background: #333;
                    color: #fff;
                    padding: 10px 0;
                    text-align: center;
                }
                nav ul {
                    list-style-type: none;
                    padding: 0;
                }
                nav ul li {
                    display: inline;
                    margin: 0 10px;
                }
                nav ul li a {
                    color: #fff;
                    text-decoration: none;
                }
                main {
                    padding: 20px;
                    max-width: 800px;
                    margin: auto;
                    background: #fff;
                    border-radius: 5px;
                }
            </style>
        </head>
        <body>
            <header>
                <h1>Thank You for Your Feedback!</h1>
                <nav>
                    <ul>
                        <li><a href='index.html'>Home</a></li>
                        <li><a href='menu.html'>Menu</a></li>
                        <li><a href='contact.html'>Contact</a></li>
                        <li><a href='coffee-survey.html'>Survey</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <h2>Your Survey Responses Have Been Sent!</h2>
                <p>Thank you for taking the time to complete our survey. Your feedback is greatly appreciated.</p>
            </main>
        </body>
        </html>";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>