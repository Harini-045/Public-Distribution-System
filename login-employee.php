<!DOCTYPE html>
<html lang="en">

<head>
    <title>PDS</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            background-color: rgb(255, 255, 255);
            background-size: cover; /* Adjust the image size */
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 32px;
            margin: 0;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            background-color: rgb(32, 55, 114);
            color: rgb(255, 255, 255);
        }

        .w3l-login-form {
            width: 80%; /* Adjust the width as per your preference */
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .w3l-form-group {
            margin-bottom: 20px;
        }

        .group {
            position: relative;
        }

        .group i {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #ccc;
        }

        .form-control {
            width: calc(100% - 30px);
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        h2 {
            text-align: center;
            color: rgb(32, 55, 114);
        }

        button {
            background-color: rgb(32, 55, 114);
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .w3l-register-p {
            color: rgb(32, 55, 114);
            text-align: center;
            margin-top: 20px;
        }

        .register {
            color: rgb(32, 55, 114);
            font-weight: bold;
        }

        .g-recaptcha {
            margin-top: 20px;
        }

        .w3l-register-p {
            color: rgb(32, 55, 114);
            font-weight: bold;
        }
        .w3l-form-group {
            text-color: rgb(32, 55, 114);
        }
    </style>
</head>

<body>
    <h1>PUBLIC DISTRIBUTION SYSTEM</h1>
    <div class="w3l-login-form">
        <h2>Employee Login</h2>
        <form action="includes/login-hm.inc.php" method="POST">

        <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
                </div>
            </div>
           <!-- <div class="g-recaptcha" data-sitekey="6LcYchQoAAAAAHP9pAVWAl0uBF77LXrK-IXKcZTx" data-action="login-submit"></div> -->

            <button type="submit" name="login-submit">Login</button>
        </form>
        <p class="w3l-register-p"><a href="index.php" class="register">Login as Cardholder</a></p>

    </div>
</body>

</html>