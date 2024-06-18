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
  <title>STORE INFORMATION</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-beige-100">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div class="bg-custom-red text-white w-1/4 p-6 flex flex-col items-center">
      <img src="./asset/icons/owner.jpg" alt="" class="w-20 h-20 mb-2 rounded-full object-cover">
      <div class="text-center">
        <p class="font-light"><?php echo $_SESSION['login']['nama'] . " !"; ?></p>
        <p class="text-lg mt-2">Welcome !</p>

      </div>
      <button class="mt-auto py-2 px-6 w-24 bg-beige-300 text-custom-red font-semibold rounded-full"
        onclick="window.location.href = 'cataloguePenjual.php';">NEXT</button>
    </div>
    <!-- Main Content -->
    <div class="bg-beige-100 flex-1 p-16">
      <form method="post" action="">
        <div class="space-y-4">
          <input type="text" name="store_name" placeholder="STORE NAME"
            class="w-full py-4 bg-custom-red text-white text-xl font-semibold rounded text-left px-4 placeholder-white"
            required />
          <input type="text" name="store_address" placeholder="STORE ADDRESS"
            class="w-full py-4 bg-custom-red text-white text-xl font-semibold rounded text-left px-4 placeholder-white"
            required />
          <input type="email" name="email" placeholder="EMAIL"
            class="w-full py-4 bg-custom-red text-white text-xl font-semibold rounded text-left px-4 placeholder-white"
            required />
          <input type="text" name="phone_number" placeholder="PHONE NUMBER"
            class="w-full py-4 bg-custom-red text-white text-xl font-semibold rounded text-left px-4 placeholder-white"
            required />
          <button type="submit"
            class="mt-4 py-2 px-6 bg-beige-300 text-custom-red font-semibold rounded-full">SUBMIT</button>
          <button class="mt-2 py-2 px-3 w-24 bg-beige-300 text-custom-red font-semibold rounded-full"
            onclick="window.location.href = 'index.php';">CANCEL</button>
        </div>
      </form>
      <!-- Image at the bottom -->
      <div class="mt-8 flex justify-center pr-8">
        <img src="./asset/logoEventGear.png" alt="Store Image" class="rounded" width="350" height="350">
      </div>
    </div>
  </div>

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
</body>

</html>

<?php
$conn->close();
?>