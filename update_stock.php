<?php
// Include the database connection file
require 'includes/config.inc.php'; // Adjust the path as needed

// Check if all required parameters are set
if (isset($_POST['productName'], $_POST['quantity'], $_POST['isIncrease'], $_POST['pdsId'])) {
    // Extract the parameters
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $isIncrease = $_POST['isIncrease'];
    $pdsId = $_POST['pdsId'];

    // Update the stock based on the operation (increase or decrease)
    $sql = "UPDATE pds_item SET stock_quantity = stock_quantity " . ($isIncrease ? "+" : "-") . " ? WHERE pds_id = ? AND item_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dis", $quantity, $pdsId, $productName);

    if ($stmt->execute()) {
        // Stock updated successfully
        echo "Stock updated successfully";
    } else {
        // Failed to update stock
        echo "Failed to update stock";
    }
} else {
    // Missing parameters
    echo "Missing parameters";
}
?>
