<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Redressal</title>
    <style>
        body {
            background-color: #f4f4f4; /* Light Gray background */
            color: #333; /* Dark Gray text color */
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #0066cc; /* Government Blue header color */
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            color: #0066cc; /* Government Blue label color */
            font-weight: bold;
        }

        input, select {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc; /* Light Gray border */
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0066cc; /* Government Blue submit button */
            color: #ffffff;
            cursor: pointer;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #004080; /* Darker Blue on hover */
        }

        p {
            color: #008000; /* Green success message */
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<?php
require 'includes/config.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['cardnumber'])) {
    // Redirect the user to the login page if they are not logged in
    header("Location: ../index.php");
    exit(); // Prevent further execution
}

// The card number is stored in the session
$cardNumber = $_SESSION['cardnumber'];

// Define variables to store user input
$userName = $complaintType = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $userName = test_input($_POST["name"]);
    $complaintType = test_input($_POST["complaintType"]);
    $message = test_input($_POST["message"]);

    // Prepare SQL statement to insert data into complaints table
    $sql = "INSERT INTO complaints (cname, card_number, complaint_type, message, status) VALUES (?, ?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userName, $cardNumber, $complaintType, $message);

    // Execute SQL statement
    try {
        if ($stmt->execute()) {
            echo "<p>Your complaint registered successfully.</p>";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Function to validate and sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Redressal</title>
    <style>
        /* Styles */
    </style>
</head>
<body>
    <h2>Grievance Redressal</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="cardNumber">Card Number:</label>
        <input type="text" name="cardNumber" value="<?php echo $cardNumber; ?>" disabled>
        <br><br>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="complaintType">Type of Complaint:</label>
        <select name="complaintType" required>
            <option value="" disabled selected>Select a complaint type</option>
            <option value="Quality issues">Quality issues</option>
            <option value="Improper shop openings">Improper shop openings</option>
            <option value="Quantity issues">Quantity issues</option>
            <option value="Product not available">Product not available</option>
        </select>
        <br><br>
        <div class="contact-fields-w3ls">
            <textarea name="message" placeholder="Message..." required=""></textarea>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
