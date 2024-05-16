<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<div id="qrcode"></div>
<script>
  var qr = new QRCode(document.getElementById("qrcode"), {
    text: "Scan QR", // Replace with your content
    width: 128, // Set the width of the QR code
    height: 128 // Set the height of the QR code
  });
</script>
