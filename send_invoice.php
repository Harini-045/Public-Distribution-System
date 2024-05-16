<?php
require 'vendor/autoload.php'; // Include PHPMailer library

// Set the content type to HTML
header('Content-type: text/html; charset=UTF-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if this script was called via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize PHPMailer
    $mail = new PHPMailer();

    // Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'bhavskutti@gmail.com'; // Your Gmail email address
    $mail->Password = 'mgyneafsxuzpnmng'; // App Password generated from your Gmail account
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Port for TLS (use 465 for SSL)

    // Recipient email address
    $recipientEmail = $_POST['recipientEmail'];

    // Invoice details
    $invoiceDetails = json_decode($_POST['invoiceDetails'], true);

    // Sender email
    $mail->setFrom('bhavskutti@gmail.com', 'PDS'); // Your Gmail email address and name

    // Recipient email
    $mail->addAddress($recipientEmail);

    // Email subject
    $mail->Subject = 'Invoice';

    // Create the email content with line breaks
    $emailContent = "Your invoice details:\n\n";

    // Parse the JSON and add each item to the email content
    $invoiceItems = $invoiceDetails['items'];
    foreach ($invoiceItems as $item) {
        $emailContent .= "Product Name: " . $item['productName'] . "\n";
        $emailContent .= "Unit: " . $item['unit'] . " kgs\n";
        $emailContent .= "Price: Rs " . $item['price'] . "\n\n";
        //$emailContent .= "Amount: Rs " . $item['amount'] . "\n\n";
    }

    // Add the total amount to the email content
    $emailContent .= "Total Amount: Rs " . $invoiceDetails['total'] . "\n";

    $mail->Body = $emailContent;

    // Send the email
    if ($mail->send()) {
        echo 'Invoice sent successfully!';
    } else {
        echo 'Failed to send the invoice.';
    }
} else {
    echo 'Invalid request'; // Respond to non-POST requests
}
?>
