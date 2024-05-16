<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recipientEmail = $_POST["recipientEmail"];
    $subject = 'Invoice';
    $message = 'Please find the invoice attached.';
    $from = 'bhavskutti@gmail.com'; // Replace with your email address

    // Capture the screenshot
    $screenshotPath = 'screenshot.png'; // Path to the screenshot file

    if (file_exists($screenshotPath)) {
        $filename = basename($screenshotPath);

        // Prepare the email headers
        $headers = "From: $from";
        $headers .= "\nMIME-Version: 1.0\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"mixedpart\"";

        // Create a boundary
        $boundary = md5(time());

        // Email message
        $message = "--mixedpart\n";
        $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"\n";
        $message .= "Content-Transfer-Encoding: 7bit\n\n";
        $message .= $message . "\n\n";

        // Attachment
        $message .= "--mixedpart\n";
        $message .= "Content-Type: application/octet-stream; name=\"$filename\"\n";
        $message .= "Content-Transfer-Encoding: base64\n";
        $message .= "Content-Disposition: attachment; filename=\"$filename\"\n\n";
        $message .= chunk_split(base64_encode(file_get_contents($screenshotPath))) . "\n\n";

        // Send the email
        if (mail($recipientEmail, $subject, $message, $headers)) {
            // Email sent successfully
            echo "Email sent!";
        } else {
            // Email sending failed
            echo "Email sending failed.";
        }
    } else {
        echo "Screenshot not found.";
    }
} else {
    echo "Invalid request.";
}
?>
