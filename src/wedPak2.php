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
    <title>Detail Paket Catering I - EventGear Alat Pesta</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFF3CD;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #730000;
            color: white;
            padding: 20px 50px;
        }

        header .logo-container {
            display: flex;
            align-items: center;
        }

        header img {
            width: 50px;
            vertical-align: middle;
        }

        header h1 {
            margin: 0 0 0 10px;
            font-size: 18px;
        }

        header .profile {
            display: flex;
            align-items: center;
        }

        header .profile img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
            margin-left: 10px;
        }

        nav {
            margin-right: 70%;
            display: flex;
            justify-content: center;
            background-color: #FFF3CD;
        }

        nav a {
            color: rgb(0, 0, 0);
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
        }

        nav a:hover {
            color: #730000;
        }

        .container {
            background-color: #730000;
            padding: 20px;
        }

        .package-header {
            display: flex;
            align-items: center;
            background-color: #FFF3CD;
            padding: 13px;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            margin-bottom: 45px;
            max-width: 600px;
            max-height: 100px;
        }

        .package-header img {
            width: 200px;
            border-radius: 8px;
            margin-left: -15px;
        }

        .package-details {
            margin-left: 20px;
            color: #730000;
        }

        .package-details h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .package-details p {
            margin: 10px 0;
            font-size: 18px;
        }

        .order-button {
            display: inline-block;
            background-color: #730000;
            color: #FFF3CD;
            padding: 10px 20px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
        }

        .description,
        .include {
            background-color: #FFF3CD;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .include ul {
            list-style-type: none;
            padding: 0;
        }

        .include li {
            margin: 10px 0;
        }

        .include li span {
            float: right;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="./asset/logo.png" alt="EventGear Logo">
            <h1>Make Your Party Unforgettable with the <br>Best Selection!</h1>
        </div>
        <div class="profile">
            <p><?php echo "Hi, " . $_SESSION['login']['nama']; ?></p>
            <a href="#"><img src="./asset/icons/owner.jpg" alt="Profile Picture"></a>
        </div>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="#">About us</a>
        <a href="#">Catalogue</a>
    </nav>
    <div class="container">
        <div class="package-header">
            <img src="./asset/icons/PKT WD 2.png" alt="Paket Catering">
            <div class="package-details">
                <h2>WEDDING PACKAGE II</h2>
                <p>Rp. 50.000.000</p>
                <a href="#" class="order-button" onclick="window.location.href = 'Pembayaranform.php';">Order</a>
            </div>
        </div>
        <div class="description">
            <h3>DETAILS WEDDING PACKAGE II</h3>
        </div>
        <div class="include">
            <h3>INCLUDE:</h3>
            <ul>
                <li>KUADE PELAMINAN LUXURY <span>1 SET</span></li>
                <li>SET KURSI PENGANTIN <span>1 SET</span></li>
                <li>KURSI TAMU BESI + SARUNG <span>3000 BUAH</span></li>
                <li>TARUB PREMIUM <span>20 UNIT</span></li>
                <li>KARPET <span>30 METER</span></li>
                <li>LIGHTING <span>7 BUAH</span></li>
                <li>BUNGA DEKORASI ASLI <span>5 BOX</span></li>
                <li>PHOTOBOOTH 360 DEJARAT <span>2 SET</span></li>
                <li>MEJA SOUVENIR <span>2 BUAH</span></li>
                <li>PINTU MASUK <span>2 SET</span></li>
            </ul>
        </div>
    </div>
</body>

</html>