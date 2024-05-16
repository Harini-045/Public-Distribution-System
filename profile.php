<?php
// Include the configuration file
require 'includes/config.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['cardnumber'])) {
    // Redirect the user to the login page if they are not logged in
    header("Location: ../index.php");
    exit(); // Prevent further execution
}

// Fetch the card number from the session
$cardNumber = $_SESSION['cardnumber'];

// Define a SQL query to select details of the cardholder
$sql = "SELECT * FROM cardholder WHERE card_number = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    // Handle SQL error
    echo "SQL error";
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $cardNumber);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch and display the details
        $row = mysqli_fetch_assoc($result);
    } else {
        // No rows returned
        echo "No user found";
        exit();
    }
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
 
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
</head>
<style>
body {
    font-family: Helvetica;
    margin: 0;
    padding: 0;
    background-color: rgb(255, 255, 255);
    background-size: cover;
}

.navbar {
    width: 100%;
    background-color: rgb(32, 55, 114);
    overflow: auto;
    position: fixed;
}

.navbar h2 {
    font-size: 32px;
    margin: 0;
    padding: 15px;
    font-weight: bold;
    color: white;
    text-align: center;
    float: left;
}

.navbar a {
    float: right;
    padding: 15px;
    color: white;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

.navbar a:hover {
    background-color: rgb(32, 55, 114);
}

.active {
    background-color: rgb(32, 55, 114);
}

@media screen and (max-width: 500px) {
    .navbar a {
        float: none;
        display: block;
    }
}

.container {
    max-width: 1200px;
    margin: -25px auto;
    padding: 0 50px;
    border-radius: 15px;

}

h1 {
    text-align: center;
}

.profile {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 100px;
    background-color: rgb(32, 55, 114);
    color:#fff;
}

.profile-info {
    margin-top: 5px;
}

.user-image {
    float: left;
    margin-right: 170px;
    margin-top: 0px;
}

.user-image img {
    width: 375px;
    /* Adjust image width as needed */
    height: 375px;
    margin-top: -70px;
    /* Makes the image round */
}

.user-details {
   

    margin-right:-57px;
    /* Clear floats */
}
.additional-details {
    float: right; /* Float the additional details division to the right */
   margin-right:20px;
    margin-top: -185px/* Adjust margin as needed */
}

.user-details h2 {
    margin-bottom: 10px;
}

.user-details p {
    margin-bottom: 5px;
}


</style>

<body>

    <div class="navbar">
        <h2>PROFILE</h2>
        <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['cardnumber']; ?></a>
        <a href="ch.php"><i class="fa fa-fw fa-home"></i> Home </a>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="profile">
            <div class="profile-info">
                <div class="user-image">
                    <img src="./assets/img/profile.png" alt="User Image">
                </div>
                <div class="user-details">
                    <h2>CARDHOLDER DETAILS</h2>
                    <br>
                    <p><strong>Card Number:</strong> <?php echo $row['card_number']; ?></p>
                    <p><strong>PDS_ID:</strong> <?php echo $row['pds_id']; ?></p>
                    <p><strong>Full Name:</strong> <?php echo $row['fullname']; ?></p>
                    <p><strong>Mobile Number:</strong> <?php echo $row['mob_no']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                </div>
                <div class="additional-details">
        <p><strong>Rice:</strong> <?php echo $row['rice']; ?>kgs</p>
        <p><strong>Wheat:</strong> <?php echo $row['wheat']; ?>kgs</p>
        <p><strong>Sugar:</strong> <?php echo $row['sugar'];?>kgs</p>
        <p><strong>Kerosene:</strong> <?php echo $row['kerosene']; ?>kgs</p>
        <!-- Add more fields as needed -->
    </div>
            </div>
        </div>
    </div>
</body>

</html>
