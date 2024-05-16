<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<title>Invoice</title>
<style>
  body {
	font-family:  Helvetica;
    margin: 0;
}

.navbar {
 background-color: rgb(32, 55, 114);
overflow: hidden;
font-size: 20px;
        }
.navbar h2 {
    font-size: 32px;
    margin: 0;
    padding: 15px;
    font-weight: bold;
    color: white;
    text-align:center;
    float: left;
}
.navbar a {
            float: right;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
        }

.navbar a:hover {
     
  background-color: rgb(32, 55, 114); 
        }

  /* Cardholder details container */
  .card {
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    padding: 20px;
    margin: 20px auto;
    max-width: 600px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .card h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
  }

  .card p {
    margin: 10px 0;
    font-size: 16px;
    color: #666;
  }

  .card ul {
    list-style-type: none;
    padding: 0;
  }

  .card ul li {
    margin-bottom: 10px;
  }

  /* Supply button styles */
  .supply-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s;
  }

  .supply-btn:hover {
    background-color: #45a049;
  }

  /* Bill table styles */
  #bill-table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
  }

  #bill-table th,
  #bill-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  #bill-table th {
    background-color: #f2f2f2;
  }

  /* Total amount styles */
  #total-amount {
    font-weight: bold;
    margin-top: 10px;
    font-size: 18px;
    color: #333;
  }

  /* Email form styles */
  .email-container {
    margin-top: 20px;
  }

  .email-container label {
    display: block;
    margin-bottom: 5px;
    font-size: 16px;
    color: #333;
  }

  .email-container input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 10px;
  }

  .email-container button {
    background-color: #337ab7;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
  }

  .email-container button:hover {
    background-color: #286090;
  }

  .i{
    margin:15px;
  }

</style>
</head>
<body>
 <!-- Navigation bar -->
 <div class="navbar">
  <h2>INVOICE</h2>
 <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
 <a href="home_manager.php"><i class="fa fa-fw fa-home"></i> Home </a> 
        <!-- Add other navigation links here if needed -->
    </div>
<div id="customer-name-form" class="i">
  <form method="post">
    <label for="customer-name">Enter Customer Name:</label>
    <input type="text" id="customer-name" name="customer_name">
    <button type="submit">Submit</button>
  </form>
</div>
<?php

// Check if the form is submitted and cardholder name exists
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customer_name'])) {
    // Fetch cardholder details based on the name provided
    $name = $_POST['customer_name']; // Get the name from the form submission
    $sql = "SELECT * FROM cardholder WHERE fullname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Display cardholder details
        $row = $result->fetch_assoc();
        $pds_id = $row['pds_id'];
        echo "<div id='cardholder-details' class='card'>";
        echo "<h2>Cardholder Details</h2>";
        echo "<p><strong>Card Number:</strong> " . $row["card_number"] . "</p>";
        echo "<p><strong>Name:</strong> " . $row["fullname"] . "</p>";
        echo "<p><strong>PDS ID:</strong> " . $row["pds_id"] . "</p>";
        echo "<p><strong>Mobile Number:</strong> " . $row["mob_no"] . "</p>";
        echo "<p><strong>Items:</strong></p>";
        echo "<ul>";

echo "<li><div style='text-align: left;'>Rice: " . $row["rice"] . " kgs <div style='text-align: center;'><button class='supply-btn' onclick=\"toggleSupply(this, 'rice', '" . $row["rice"] . "', '" . $pds_id . "')\">Supply</button></div></li>";
echo "<li>Wheat: " . $row["wheat"] . " kgs <div style='text-align: center;'><button class='supply-btn' onclick=\"toggleSupply(this, 'wheat', '" . $row["wheat"] . "', '" . $pds_id . "')\">Supply</button></div></li>";
echo "<li>Sugar: " . $row["sugar"] . " kgs <div style='text-align: center;'><button class='supply-btn' onclick=\"toggleSupply(this, 'sugar', '" . $row["sugar"] . "', '" . $pds_id . "')\">Supply</button></div></li>";
echo "<li>Kerosene: " . $row["kerosene"] . " lts <div style='text-align: center;'><button class='supply-btn' onclick=\"toggleSupply(this, 'kerosene', '" . $row["kerosene"] . "', '" . $pds_id . "')\">Supply</button></div></li>";

 echo "</ul>";
        echo "</div>";

        // Display the bill table and email form
        ?>

        <table id="bill-table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Unit</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody id="bill-body">
            <!-- Bill details will be appended here -->
          </tbody>
        </table>

        <div id="total-amount"></div>

        <div class="email-container">
          <label for="recipient-email">Recipient's Email:</label>
          <input type="email" id="recipient-email" placeholder="Enter recipient's email" value="<?php echo $row["email"]; ?>">
          <button id="send-invoice" class="b">Send Invoice</button>
        </div>

        <script src="appli.0js" async defer></script>
        <?php
    } else {
        echo "No cardholder found with the provided name.";
    }
}
?>

</body>
</html>

<script>
var totalAmount = 0; // Variable to store total amount

function requestSupply(productName, quantity) {
  // Create a new row for the bill table
  var newRow = document.createElement("tr");

  // Create cells for product name, unit, and price
  var productNameCell = document.createElement("td");
  productNameCell.textContent = productName;
  newRow.appendChild(productNameCell);

  var unitCell = document.createElement("td");
  unitCell.textContent = quantity + " kgs";
  newRow.appendChild(unitCell);

  // Use AJAX to fetch price of the product from the server
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var price = parseFloat(xhr.responseText);
        var priceCell = document.createElement("td");
        var total = price * quantity; // Calculate total price
        priceCell.textContent = "Rs " + total.toFixed(2);
        newRow.appendChild(priceCell);
        totalAmount += total; // Add to total amount
        updateTotalAmount(); // Update total amount display
      } else {
        console.error('Failed to fetch price for ' + productName);
      }
    }
  };
  xhr.open("GET", "get_price.php?product=" + productName, true);
  xhr.send();

  // Append the new row to the bill table
  document.getElementById("bill-body").appendChild(newRow);
}
function toggleSupply(button, productName, quantity, pds_id) {
  if (button.textContent === "Supply") {
    // Change button text to "Supplied"
    button.textContent = "Supplied";
    // Add the product to the bill
    requestSupply(productName, quantity);
    // Send AJAX request to update the stock (increase)
    updateStock(productName, quantity, pds_id, false);
  } else {
    // Change button text back to "Supply"
    button.textContent = "Supply";
    // Remove the product from the bill
    removeProductFromBill(productName, quantity);
    // Send AJAX request to update the stock (decrease)
    updateStock(productName, quantity, pds_id, true);
  }
}

function updateStock(productName, quantity, pdsId, isIncrease) {
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();
  
  // Configure the request
  xhr.open("POST", "update_stock.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Define the callback function
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Handle the response here if needed
        console.log("Stock updated successfully");
      } else {
        console.error("Failed to update stock");
      }
    }
  };

  // Prepare and send the request
  xhr.send("productName=" + encodeURIComponent(productName) + "&quantity=" + encodeURIComponent(quantity) + "&isIncrease=" + (isIncrease ? "1" : "0") + "&pdsId=" + encodeURIComponent(pdsId));
}


 



function removeProductFromBill(productName, quantity) {
  var rows = document.getElementById("bill-body").getElementsByTagName("tr");
  for (var i = 0; i < rows.length; i++) {
    var productNameCell = rows[i].getElementsByTagName("td")[0];
    if (productNameCell && productNameCell.textContent === productName) {
      var priceCell = rows[i].getElementsByTagName("td")[2];
      var total = parseFloat(priceCell.textContent.substring(3)); // Extract total price
      totalAmount -= total; // Subtract from total amount
      rows[i].parentNode.removeChild(rows[i]);
      updateTotalAmount(); // Update total amount after removing the product
      break;
    }
  }
}

function updateTotalAmount() {
  document.getElementById("total-amount").textContent = "Total Amount: Rs " + totalAmount.toFixed(2);
}
</script>

<script src="appli.js" async defer></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to the "send-invoice" button
    document.getElementById("send-invoice").addEventListener("click", async function() {
        console.log('Button clicked'); // Print message to console when button is clicked
        var recipientEmail = document.getElementById("recipient-email").value;
        var invoiceDetails = getFormattedInvoiceDetails(); // Get the formatted invoice details

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "send_invoice.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); // Log the response from the server
                } else {
                    console.error('Failed to send the invoice.');
                }
            }
        };
        xhr.send("recipientEmail=" + recipientEmail + "&invoiceDetails=" + JSON.stringify(invoiceDetails));
    });
});
</script>

