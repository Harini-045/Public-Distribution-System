<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Request Stock</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
	<style>
         body {
    font-family:  Helvetica;
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
    text-align:center;
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

    .contact {
        padding: 100px 0; /* Add padding to the top and bottom */
        background-color: #f5f5f5; /* Change background color */
        text-align: center; /* Center the content inside the section */
    }

    .contact .container {
        max-width: 800px; /* Set maximum width for the container */
        margin: 0 auto; /* Center the container horizontally */
    }

    .contact .heading {
        font-size: 28px;
        font-weight: bold;
        color: rgb(32, 55, 114);
        margin-bottom: 30px; /* Add margin to the bottom */
    }

    .contact .mail_grid_w3l {
        background-color: #fff; /* Change background color */
        padding: 30px; /* Add padding */
        border-radius: 5px; /* Add border radius */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
    }

    .contact .mail_grid_w3l input[type="text"] {
        max-width: 800px;/* Make input fields full width */
        padding: 10px; /* Add padding */
        margin-bottom: 20px; /* Add margin to the bottom */
        border: 1px solid #ccc; /* Add border */
        border-radius: 15px; /* Add border radius */
    }

    .contact .mail_grid_w3l input[type="submit"] {
        background-color: #337ab7; /* Change background color */
        color: #fff; /* Change text color */
        padding: 12px 20px; /* Add padding */
        border: none; /* Remove border */
        border-radius: 15px; /* Add border radius */
        cursor: pointer; /* Add cursor pointer */
        transition: background-color 0.3s; /* Add transition effect */
    }

    .contact .mail_grid_w3l input[type="submit"]:hover {
        background-color: rgb(32, 55, 114); /* Change background color on hover */
    }
	.contact_left_grid .contact-fields-w3ls input[type="text"] {
		max-width: 800px; /* Make input fields full width */
        padding: 15px; /* Increase padding */
        margin-bottom: 20px; /* Add margin to the bottom */
        border: 1px solid #ccc; /* Add border */
        border-radius: 5px; /* Add border radius */
        font-size: 16px; /* Increase font size */
    }

    .contact_left_grid input[type="submit"] {
        background-color: #337ab7; /* Change background color */
        color: #fff; /* Change text color */
        padding: 15px 15px; /* Increase padding */
        border: none; /* Remove border */
        border-radius: 5px; /* Add border radius */
        cursor: pointer; /* Add cursor pointer */
        transition: background-color 0.3s; /* Add transition effect */
        font-size: 16px; /* Increase font size */
    }

    .contact_left_grid input[type="submit"]:hover {
        background-color: rgb(32, 55, 114); /* Change background color on hover */
    }
	</style>
	
</head>

<body>
<div class="navbar">
<h2>REQUEST STOCK</h2>
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
  <a href="home_manager.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>

<br><br><br><br><br>
<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
			<h2 class="heading text-capitalize mb-sm-5 mb-4"> Request stock from Admin</h2>
				<form action="request_stock.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							
							<div class="contact-fields-w3ls">
								<input type="text" name="pds_id" placeholder="PDS ID" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="username" placeholder="Username" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="item_name" placeholder="Item Name" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="quantity" placeholder="Quantity" required="">
							</div>
							<input type="submit" name="submit" value="Submit">
						</div>
						
							
						
					</div>

				</form>
			</div>
		
	</div>
</section>
<!-- //contact -->



<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	
<!-- //js-scripts -->

</body>
</html>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pds_id = $_POST['pds_id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    // Check if quantity is greater than 25
    if($quantity <= 25) {
        echo "<script>alert('Request can be sent only above 25 units');</script>";
    } else {
        // Check if quantity is less than or equal to oldstock
        $queryOldStock = "SELECT oldstock FROM pds_item WHERE pds_id = '$pds_id' AND item_name = '$item_name'";
        $resultOldStock = mysqli_query($conn, $queryOldStock);
        $rowOldStock = mysqli_fetch_assoc($resultOldStock);
        $oldStock = $rowOldStock['oldstock'];

        if ($quantity <= $oldStock) {
            echo "<script>alert('Sufficient stock available');</script>";
        } else {
            // Insert message into database
            $today_date = date("Y-m-d");
            $query = "INSERT INTO Message (sender_id,receiver_id,item_name,quantity,msg_date) VALUES ('$pds_id','admin','$item_name','$quantity','$today_date')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Message sent Successfully!')</script>";
            } else {
                echo "<script>alert('Error in sending message!!! Please try again.')</script>";
            }
        }
    }
}
?>
