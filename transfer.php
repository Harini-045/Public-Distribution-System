<?php
// Include the database connection file
require 'includes/config.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

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
    </style>
</head>
<body>
<div class="navbar">
    <h2>ADMIN PANEL</h2>
    <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
    <a href="admin/admin_home.php"><i class="fa fa-fw fa-home"></i> Home </a>
</div>
<br><br><br><br><br>

<?php
// Retrieve data from the URL
$itemName = $_GET['itemName'];
$quantity = $_GET['quantity'];
$pdsId = $_GET['sender_id'];
?>

<!-- Display the retrieved data at the top of the page -->
<h2>REQUEST FROM SHOP <?php echo $pdsId; ?></h2>
<h2><?php echo $itemName; ?> : <?php echo $quantity; ?></h2>


<?php
// Check if the transfer form is submitted
if(isset($_POST['transfer'])){
    // Get the shop IDs, item name, and quantity to transfer from the form
    $shopIdFrom = $_POST['shopIdFrom'];
    $shopIdTo = $_POST['shopIdTo'];
    $itemName = $_POST['itemName'];
    $quantityToTransfer = $_POST['quantityToTransfer'];

    // Query to get the old stock quantity
    $queryGetOldStock = "SELECT oldstock FROM pds_item WHERE pds_id = $shopIdFrom AND item_name = '$itemName'";
    $resultGetOldStock = $conn->query($queryGetOldStock);
    $rowGetOldStock = $resultGetOldStock->fetch_assoc();
    $oldStock = $rowGetOldStock['oldstock'];

    // Query to check if sufficient old stock quantity is available
    if($oldStock >= $quantityToTransfer) {
        // Query to update the stock quantity for the shop from which the transfer is made
        $queryReduceStock = "UPDATE pds_item SET oldstock = oldstock - $quantityToTransfer WHERE pds_id = $shopIdFrom AND item_name = '$itemName'";
        // Execute the query to reduce stock from the sending shop
        $resultReduceStock = $conn->query($queryReduceStock);

        $queryReduceStock1 = "UPDATE pds_item SET stock_quantity = stock_quantity - $quantityToTransfer WHERE pds_id = $shopIdFrom AND item_name = '$itemName'";
        // Execute the query to reduce stock from the sending shop
        $resultReduceStock1 = $conn->query($queryReduceStock1);

        // Query to update the stock quantity for the shop to which the transfer is made
        $queryIncreaseStock = "UPDATE pds_item SET stock_quantity = stock_quantity + $quantityToTransfer WHERE pds_id = $shopIdTo AND item_name = '$itemName'";
        // Execute the query to increase stock for the receiving shop
        $resultIncreaseStock = $conn->query($queryIncreaseStock);

        if($resultReduceStock && $resultIncreaseStock && $resultReduceStock1){
            // Stock transferred successfully
            echo "<script>alert('Stock transferred successfully.');</script>";
        } else {
            // Error transferring stock
            echo "<script>alert('Error transferring stock. Please try again.');</script>";
            // Debugging: Print SQL errors, if any
            echo "SQL Error: " . $conn->error;
        }
    } else {
        // Insufficient old stock quantity
        echo "<script>alert('Insufficient old stock quantity available for transfer.');</script>";
    }
}
?>

<?php
// Retrieve data from the pds_item table
$queryShops = "SELECT DISTINCT pds_id FROM pds_item";
$resultShops = $conn->query($queryShops);

// Loop through each shop
while ($shop = $resultShops->fetch_assoc()): ?>
    <?php
    $shopId = $shop['pds_id'];
    $queryItems = "SELECT item_name, stock_quantity, oldstock FROM pds_item WHERE pds_id = $shopId";
    $resultItems = $conn->query($queryItems);
    ?>

    <h2>Shop ID: <?php echo $shopId; ?></h2>

    <table>
        <thead>
        <tr>
            <th>Item Name</th>
            <th>Excess Stock</th>
            <th>Transfer</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $resultItems->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['oldstock']; ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="shopIdFrom" value="<?php echo $shopId; ?>">
                        <input type="hidden" name="itemName" value="<?php echo $row['item_name']; ?>">
                        <input type="number" name="quantityToTransfer" placeholder="Quantity" required>
                        <input type="text" name="shopIdTo" placeholder="Transfer to Shop ID" required>
                        <button type="submit" name="transfer">Transfer</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

<?php endwhile; ?>

</body>
</html>
