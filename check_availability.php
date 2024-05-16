<?php
// Connect to the database (replace with your database configuration)
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get customer login from the POST request
$customerLogin = $_POST['customer_login'];

// Query the database to fetch shop and product availability
$sql = "SELECT a.shopAvailability, a.rice, a.sugar, a.wheat, a.kerosene
        FROM available a
        INNER JOIN cardholder c ON a.shopId = c.pds_id
        WHERE c.card_number = '$customerLogin'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the availability results
    $row = $result->fetch_assoc();
    $shopAvailability = $row['shopAvailability'];
    $riceAvailability = $row['rice'];
    $sugarAvailability = $row['sugar'];
    $wheatAvailability = $row['wheat'];
    $keroseneAvailability = $row['kerosene'];

    echo "<p>Shop Availability: $shopAvailability</p>";
    echo "<p>Rice Availability: $riceAvailability</p>";
    echo "<p>Sugar Availability: $sugarAvailability</p>";
    echo "<p>Wheat Availability: $wheatAvailability</p>";
    echo "<p>Kerosene Availability: $keroseneAvailability</p>";
} else {
    echo "Customer not found.";
}

$conn->close();
?>
