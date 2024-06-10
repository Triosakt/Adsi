<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulir Kontak</title>
  <link rel="stylesheet" href="./output.css">
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #feeec5;
    }

    .containers {
      width: 500px;
      margin: 50px auto 100px; /* top right bottom left */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    input[type="date"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      border: none;
    }

    input[type="text"]::placeholder,
    input[type="date"]::placeholder,
    select::placeholder {
      color: #999;
    }

    .button-group {
      text-align: center;
    }

    button {
      padding: 10px 20px;
      background-color: #6f0b0b;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #6f0b0b;
    }

    button:disabled {
      background-color: #ccc;
      cursor: default;
    }

    header {
      padding: 20px;
      background-color: #6f0b0b;
      border-bottom: 1px solid #ccc;
      color: white;
    }

    header h2 {
      margin-bottom: 10px;
    }

    header h3 {
      margin: 0;
      color: white;
      font-weight: bold;
      font-size: 1.2em; /* Make the text larger */
    }

    header h2 {
      font-size: 1.5em; /* Make the text smaller */
      font-weight: bold;
    }

    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }

    .popup-content {
      background-color: #6f0b0b;
      padding: 40px;
      border-radius: 30px; /* Increased border radius */
      text-align: center;
      width: 400px;
      color: #feeec5;
    }

    .popup-content h2 {
      margin: 0 0 20px;
      font-size: 1.5em;
      color: #feeec5;
    }

    .popup-content button {
      padding: 10px 20px;
      margin: 10px;
      background-color: #feeec5;
      color: black; /* Changed text color to black */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold; /* Made text bold */
    }

    .popup-content button:hover {
      background-color: #f2d7a5;
    }
  </style>
</head>
<body>
  <header>
    <h2>Order Confirmation</h2>
  </header>

  <div class="containers">
    
  
  </div>

  <div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
      <h2>Is your data correct?</h2>
      <button onclick="submitForm()">Yes</button>
      <button onclick="hidePopup()">No</button>
    </div>
  </div>

  <?php include "layout/footer.php" ?>

  <script>
    function showPopup() {
      document.getElementById('popupOverlay').style.display = 'flex';
    }

    function hidePopup() {
      document.getElementById('popupOverlay').style.display = 'none';
    }

    function submitForm() {
      // Optionally, you can gather form data here and send it via POST or GET
      window.location.href = 'Melakukanpembayaran.php';
    }

    function cancelForm() {
      document.getElementById('contactForm').reset();
    }
  </script>
</body>
</html>
