<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cardholder Details</title>
<style>
  /* Styling for the cardholder details */
  .card {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
  }

  /* Styling for the supply button */
  .supply-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
  }

  .supply-btn:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<div id="cardholder-details" class="card">
  <h2>Cardholder Details</h2>
  
  <form method="post">
    <label for="customer-name">Enter Customer Name:</label>
    <input type="text" id="customer-name" name="customer_name">
    <button type="submit">Submit</button>
  </form>
  <?php
require 'includes/config.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch quantities allocated for the customer
    $name = $_POST['customer_name'];
    
    $sql = "SELECT * FROM cardholder WHERE fullname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch prices of each product
        $prices = array();
        $sql_price = "SELECT * FROM price";
        $result_price = $conn->query($sql_price);
        while ($row_price = $result_price->fetch_assoc()) {
            $prices[$row_price['item']] = $row_price['price'];
        }
        
        // Generate bill data
        $bill_data = array();
        $row = $result->fetch_assoc();
        $bill_data['card_number'] = $row["card_number"];
        $bill_data['name'] = $row["fullname"];
        $bill_data['items'] = array(
            'rice' => array('quantity' => $row["rice"], 'price' => $prices['rice']),
            'wheat' => array('quantity' => $row["wheat"], 'price' => $prices['wheat']),
            'sugar' => array('quantity' => $row["sugar"], 'price' => $prices['sugar']),
            'kerosene' => array('quantity' => $row["kerosene"], 'price' => $prices['kerosene'])
        );
        
        // Output bill data as JSON
        echo json_encode($bill_data);
    } else {
        echo json_encode(array('error' => 'No cardholder found with the provided name.'));
    }
    
    $conn->close();
}
?>
</div>

<script>
  
</script>

</body>
</html>