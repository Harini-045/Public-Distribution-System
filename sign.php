<?php
		  require 'includes/config.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- //js -->
<link href="../web_profile/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="../web_profile/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../web_profile/js/sliding.form.js"></script>
<link rel="stylesheet" href="web_profile/css/font-awesome.min.css" />
<link rel="stylesheet" href="web_profile/css/smoothbox.css" type='text/css' media="all" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> 
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
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
.container {
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 60px;
    margin: 50px auto; /* Centering the container box */
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 590px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}
.send-button {
  text-align: left; /* Align button to the center */
}

.send-button input[type="submit"] {
  background-color: #007bff; /* Button background color */
  color: #fff; /* Text color */
  border: none; /* Remove border */
  padding: 13px 20px; /* Padding around the text */
  font-size: 16px; /* Text size */
  cursor: pointer; /* Show pointer on hover */
  border-radius: 5px; /* Rounded corners */
  transition: background-color 0.3s ease; /* Smooth transition effect */
}

.send-button input[type="submit"]:hover {
  background-color: #0056b3; /* Change background color on hover */
}


@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
</style>
</head>
<body>
<div class="navbar">
<h2>APPOINT/REMOVE EMPLOYEE</h2>
<a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
  <a href="admin_home.php"><i class="fa fa-fw fa-home"></i> Home </a>
</div>
<br><br><br>
    <div class="container">
        <header>Appoint Card Holder</header>
        <br><br>
        <form action="includes/ch_signup.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Card Number</label>
                            <input type="text" name="card_number"  placeholder="Ration Card Number" required>
                        </div>
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="fullname" placeholder="Enter your Full name" required>
                        </div>

                        <div class="input-field">
                            <label>PDS ID</label>
                            <input type="text"  name="pds_id" placeholder="Enter pds id number" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_no" placeholder="Enter your mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Rice</label>
                            <input type="text" name="rice" placeholder="Rice(in kgs)" required>
                        </div>

                        <div class="input-field">
                            <label>Wheat</label>
                            <input type="text" name="wheat" placeholder="Wheat(in kgs)" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Sugar</label>
                            <input type="text" name="sugar" placeholder="Sugar(in kgs)" required>
                        </div>

                        
                        <div class="input-field">
                            <label>Kerosene</label>
                            <input type="text" name="kerosene" placeholder="Kerosene(in litres)" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="pwd" placeholder="Enter password" required>
                        </div>
                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="password" name="confimpwd" placeholder="Enter password" required>
                        </div>
                    </div>
                </div>
                <div class="send-button">
                    <input type="submit" name="ch_signup_submit">
                  </div>
</form>
                  <br><br>
                  <header>Remove Card Holder</header>
        <br><br>
        <form action="includes/ch_remove.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                    <div class="input-field">
                            <label>Card Number</label>
                            <input type="text" name="card_number"  placeholder="Ration Card Number" required>
                        </div>

                        <div class="input-field">
                            <label>PDS ID</label>
                            <input type="number"  name="pds_id" placeholder="Enter pds id number" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="pass" placeholder="Enter Admin password" required>
                        </div>
                        
                        <div class="send-button">
                    <input type="submit" name="ch_remove_submit">
                  </div>
                    </div>
                </div> 
            </div>
</div>
</form>
</div>
    </div>

    <script type="text/javascript" src="web_profile/js/smoothbox.jquery2.js"></script>
</body>
</html>