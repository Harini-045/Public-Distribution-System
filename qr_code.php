<!DOCTYPE html>
<html>
<head>
<style>
  body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url('main.jpeg');
    background-size: cover;
  }
  

  .qr-code {
    width: 400px; /* Set your desired width */
    height: 400px; /* Set your desired height */
  }

  .text {
    font-size: 50px; /* Set your desired font size */
    text-align: center;
    margin-top: 20px;
  }
</style>
</head>
<body>
<p class="text">Scan QR to pay</p>
  <img src="qr.jpg" class="qr-code" alt="QR Code">
  
</body>
</html>
