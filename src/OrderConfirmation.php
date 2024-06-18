<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #FFF2CC;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: auto;
      padding: 20px;
    }

    .header {
      background-color: #8B0000;
      color: white;
      padding: 10px;
      text-align: center;
    }

    .header h1 {
      margin: 0;
    }

    .order-table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    .order-table th,
    .order-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .order-table th {
      background-color: #8B0000;
      color: white;
    }

    .checkmark {
      color: green;
    }

    .crossmark {
      color: red;
    }

    .back-button {
      display: block;
      width: 100px;
      margin: 20px auto;
      padding: 10px;
      background-color: #8B0000;
      color: white;
      border: none;
      cursor: pointer;
      text-align: center;
    }

    .footer {
      display: flex;
      justify-content: space-around;
      padding: 20px 0;
      border-top: 1px solid #ddd;
      margin-top: 20px;
    }

    .footer div {
      width: 30%;
    }

    .footer h2 {
      margin-bottom: 10px;
    }

    .footer p {
      margin: 5px 0;
    }

    .footer a {
      text-decoration: none;
      color: #8B0000;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .message {
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #8B0000;
      background-color: #FFD2D2;
      color: #8B0000;
      text-align: center;
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
</body>

</html>