<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: logins.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EventGear Alat Pesta</title>
  <link rel="stylesheet" href="output.css">
  <style>
    .content {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      background-color: #FFF3CD;
      padding: 20px;
    }

    .row {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      width: 100%;
    }

    .card {
      background-color: #730000;
      margin: 10px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
      text-align: center;
      width: 200px;
    }

    .card img {
      width: 100%;
      border-radius: 8px;
    }

    .card h2 {
      color: white;
      background-color: #730000;
      padding: 10px;
      border-radius: 8px;
      font-size: 20px;
    }
  </style>

</head>

<body class="bg-nav">
  <header class="">
    <nav class="flex items-center justify-between py-6 px-4 container mx-auto">
      <div class="flex items-center">
        <img class="w-24" src="./asset/logo.png" alt="logo" />
        <a class="font-bold max-w-xs" href="#">Make Your Party Unforgettable with the Best Selection!</a>
      </div>
      <div class="flex items-center gap-x-10 me-10">
        <p><?php echo "Hi, " . $_SESSION['login']['nama']; ?></p>
        <div class="w-20 h-20 rounded-full">
          <img class="w-20 h-20 rounded-full object-cover" src="./asset/icons/owner.jpg" alt="" />
        </div>
        <img class="toggle-btn" id="toggle-btn" src="./asset/list 1.svg" alt="" />
      </div>
    </nav>

  </header>
  <nav class="font-bold text-xl ps-6 bg-primary text-white py-3">
    <div class="container mx-auto flex gap-10">
      <a href="#">Home</a>
      <a href="About.php">About</a>
      <a href="cataloguePenjual.php">Catalogue</a>
      <a href="OrderConfirmation.php">Order Confirmation</a>
      <a href="payment.history.php">Payment Hisotry</a>
    </div>
  </nav>
  <div class="sidebar" id="sidebar">
    <a href="#">Profile</a>
    <a href="Setting.php">Setting</a>
    <a href="pemilik.php">Start Selling</a>
    <a href="logout.php">Log Out</a>

  </div>

  <div class="overlay" id="overlay"></div>

  <section class="content">
    <div class="row">
      <a href="paketwedding-add.php" style="text-decoration: none; color: inherit;">
        <div class="card">
          <img src="./asset/catering.png" alt="Paket Catering">
          <h2>Catering Packages</h2>
        </div>
      </a>
      <a href="PaketWedding2.php" style="text-decoration: none; color: inherit;">
        <div class="card">
          <img src="./asset/wedding.png" alt="Paket Wedding">
          <h2>Wedding Packages</h2>
        </div>
      </a>
      <a href="PaketEngagement.php" style="text-decoration: none; color: inherit;">
        <div class="card">
          <img src="./asset/engagement.png" alt="Paket Engagement">
          <h2>Engagement Packages</h2>
        </div>
      </a>
    </div>
    <div class="row">
      <a href="PaketBirtday.php" style="text-decoration: none; color: inherit;">
        <div class="card">
          <img src="./asset/birthday.png" alt="Paket Birthday">
          <h2>Birthday Packages</h2>
        </div>
      </a>
      <a href="PaketAqiqah.php" style="text-decoration: none; color: inherit;">
        <div class="card">
          <img src="./asset/aqiqah.png" alt="Paket Aqiqah">
          <h2>Aqiqah Packages</h2>
        </div>
      </a>
      <a href="PaketKhitanan.php" style="text-decoration: none; color: inherit;">
        <div class="card">
          <img src="./asset/khitanan.png" alt="Paket Khitanan">
          <h2>Circumcision Packages</h2>
        </div>
      </a>
    </div>
  </section>
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
      background-color: #6F0B0B;
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
  </script>
</body>

</html>