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
$dbname = "pendaftaranakun"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $store_name = $_POST['store_name'];
    $store_address = $_POST['store_address'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO stores (store_name, store_address, email, phone_number) VALUES ('$store_name', '$store_address', '$email', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Reconnect to database for fetching payment history
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil riwayat pembayaran pengguna saat ini
$user_id = $_SESSION['login']['id'];
$sql = "SELECT proof_of_payment, created_at FROM payments WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result === FALSE) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        $payments = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $payments = [];
    }
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
            <a href="index.php">Home</a>
            <a href="About.php">About</a>
            <a href="catalogue.php">Catalogue</a>
            <a href="OrderConfirmation.php">Order Confirmation</a>
            <a href="payment.history.php">Payment Hisotry</a>
        </div>
    </nav>

    <div class="overlay" id="overlay"></div>

    <section class="content">
        <!-- Payment History -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold mb-4">Payment History</h2>
            <?php if (!empty($payments)): ?>
                <div class="space-y-4">
                    <?php foreach ($payments as $payment): ?>
                        <div class="bg-white p-4 rounded shadow">
                            <p>Proof of Payment: <a href="<?php echo $payment['proof_of_payment']; ?>" target="_blank">View</a>
                            </p>
                            <p>Date: <?php echo $payment['created_at']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No payment history found.</p>
            <?php endif; ?>
        </div>
    </section>
    <?php include "layout/footer.php"; ?>

    <style>
        .bg-beige-100 {
            background-color: #f5e9d2;
        }

        .bg-beige-300 {
            background-color: #f4d8a4;
        }

        .bg-custom-red {
            background-color: #6F0B0B;
        }

        .text-custom-red {
            color: #6F0B0B;
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