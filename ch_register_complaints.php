<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Style CSS -->
      <link rel="stylesheet" href="assets/css/style.css">
      <!-- Demo CSS (No need to include it into your project) -->
      <link rel="stylesheet" href="assets/css/demo.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
      <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #ffffff;
        }
        textarea{
            font-family: Arial, Helvetica, sans-serif;
        }
        
        h1 {
          background-color: rgb(32, 55, 114);
  width: 1600px;
  padding: 20px;
  margin: 0px;
  color:white;
  text-align:center;
  font-weight: bold;
  font-size: 32px;
        }
        h2 {
            color: 	white; /* Government Blue header color */
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
            echo "<script>alert('Successfully registered');</script>";
            
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
<script>
function myFunction() {
  alert("The form was submitted");
}
</script>

   <h1>GRIEVANCE REDRESAL</h1>
      <!--$%adsense%$-->
      <main class="cd__main">
         <!-- Start DEMO HTML (Use the following code into your project)-->
         <main>
  <section class="card">
    <!-- cube img -->
    
    <!-- Images -->
    <div class="card__img">
      <!-- mobile -->
      <img class="card__img-mobile" src="https://raw.githubusercontent.com/MizAndhre/FAQ-accordion-card/2ff2a02d093554f14d0390a409e825669313a16e/images/illustration-woman-online-mobile.svg" alt="Woman online Mobile" />
      <!-- desktop -->
      <img class="card__img-desktop" src="https://raw.githubusercontent.com/MizAndhre/FAQ-accordion-card/2ff2a02d093554f14d0390a409e825669313a16e/images/illustration-woman-online-desktop.svg" alt="Woman online desktop" />
    </div>

    <!-- Text -->
    <div class="card__text">
      <h2>GRIEVANCE</h2>

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
            <textarea name="message" placeholder="Leave a Message" required="" rows="2" cols="55"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>


</div>
  </section>
</main>


         <!-- END EDMO HTML (Happy Coding!)-->
      </main>
      <!-- Script JS -->
      <script src="./script.js"></script>
      <!--$%analytics%$-->
   </body>
</html>