<?php
// Include the database connection file
require 'includes/config.inc.php'; // Adjust the path as needed

// Check if the product name is provided
if(isset($_GET['product'])) {
    $productName = $_GET['product'];

    // Prepare and execute the SQL query to fetch the price for the provided product name
    $sql = "SELECT price FROM price WHERE item = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
        echo $price; // Send the price as a response
    } else {
        echo "Price not found for " . $productName; // Return a message if price not found
    }
} else {
    echo "Product name not provided"; // Return a message if product name is not provided
}

// Close database connection
$conn->close();
?>
