<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: logins.php");
  exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaranakun";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $proof_of_payment = $_FILES['proof_of_payment']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($proof_of_payment);

  // Pastikan direktori uploads ada
  if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  // Simpan file yang di-upload
  if (move_uploaded_file($_FILES['proof_of_payment']['tmp_name'], $target_file)) {
    $user_id = $_SESSION['login']['id']; // Pastikan ini sesuai dengan ID pengguna yang valid di tabel pengguna
    $sql = "INSERT INTO payments (user_id, proof_of_payment) VALUES ('$user_id', '$target_file')";

    if ($conn->query($sql) === TRUE) {
      echo "New payment record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EventGear Party Equipment</title>
  <link rel="stylesheet" href="output.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .content {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      background-color: #FFF3CD;
      padding: 20px;
    }

    .payment-info {
      background-color: #6F0B0B;
      color: white;
      padding: 20px;
      border-radius: 8px;
      margin: 20px auto;
      width: 100%;
      max-width: 600px;
      box-sizing: border-box;
    }

    .payment-header {
      background-color: #6F0B0B;
      color: white;
      padding: 15px 20px;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }

    .payment-info p {
      font-size: 18px;
      text-align: center;
    }

    .payment-info img {
      width: 150px;
      display: block;
      margin: 20px auto;
    }

    .payment-info .bank-details {
      font-size: 20px;
      margin: 10px 0;
    }

    .payment-info .instructions {
      margin: 20px 0;
    }

    .payment-info .upload-section {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .payment-info .upload-section button {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      background-color: #333;
      color: white;
      cursor: pointer;
    }

    .popup {
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: #FEEEC5;
      color: #6F0B0B;
      padding: 60px;
      border-radius: 20px;
      font-style: italic;
      font-weight: bold;
      z-index: 1001;
      text-align: center;
      font-size: 24px;
    }
  </style>
</head>

<body class="bg-nav">
  <?php include "layout/header.php" ?>
  <div class="sidebar" id="sidebar">
    <a href="#">Profile</a>
    <a href="Setting.php">Setting</a>
    <a href="pemilik.php">Start Selling</a>
    <a href="logout.php">Log Out</a>
  </div>
  <div class="overlay" id="overlay"></div>

  <div class="content">
    <div class="payment-info">
      <div class="payment-header">MAKE PAYMENT IMMEDIATELY!</div>
      <p>Your order will be processed after you make the payment.</p>
      <img src="asset/icons/BNI.webp" alt="BNI Logo">
      <div class="bank-details">
        <p>1497652434</p>
        <p>a/n Safira Aulia</p>
      </div>
      <div class="instructions">
        <p>Send your proof of payment to the place we have provided below!</p>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="upload-section">
          <input type="file" id="proof_of_payment" name="proof_of_payment" style="display:none;" required>
          <button type="button" onclick="document.getElementById('proof_of_payment').click()">
            <i class="fas fa-image"></i> Add image
          </button>
          <button type="submit" id="send-btn">Send</button>
          <button type="button">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <div id="popup" class="popup">Your transaction is valid !!</div>

  <?php include "layout/footer.php"; ?>
  <style>
    .sidebar {
      position: fixed;
      top: 30px;
      right: -250px;
      width: 200px;
      background-color: #6F0B0B;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: right 0.3s ease;
      z-index: 1000;
      border-top-left-radius: 50px;
      border-bottom-left-radius: 50px;
    }

    .sidebar a:last-child {
      margin-top: 100px;
      margin-bottom: 10px;
    }

    .sidebar.active {
      right: 0;
    }

    .sidebar a {
      display: block;
      width: 150px;
      height: 50px;
      padding: 15px;
      margin-top: 10px;
      margin-bottom: 0;
      background-color: #F5DEB3;
      color: #6f0b0b;
      text-align: center;
      text-decoration: none;
      border-radius: 20px;
      font-weight: bold;
    }

    .toggle-btn {
      top: 20px;
      right: 20px;
      cursor: pointer;
    }

    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    .overlay.active {
      display: block;
    }

    body.body-lock-scroll {
      overflow: hidden;
    }

    .text-justify {
      text-align: justify;
    }

    .bg-beige-100 {
      background-color: #f5e9d2;
    }
  </style>

  <script src="./../node_modules/preline/dist/preline.js"></script>
  <script>
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');
      overlay.classList.toggle('active');
      document.body.classList.toggle('body-lock-scroll');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      document.body.classList.remove('body-lock-scroll');
    });

    document.getElementById('send-btn').addEventListener('click', () => {
      const popup = document.getElementById('popup');
      popup.style.display = 'block';
      setTimeout(() => {
        popup.style.display = 'none';
      }, 3000);
    });
  </script>
</body>

</html>