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

// Ambil data paket catering untuk diedit
$package_id = isset($_GET['id']) ? intval($_GET['id']) : 1; // Ganti dengan ID yang sesuai
$sql = "SELECT * FROM catering_packages WHERE id = $package_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $package = $result->fetch_assoc();
} else {
  echo "No package found.";
  exit();
}

// Update data paket catering
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $cost = $_POST['cost'];

  $sql = "UPDATE catering_packages SET name='$name', description='$description', cost='$cost' WHERE id=$package_id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
  <title>Edit Catering Package</title>
  <link rel="stylesheet" href="./output.css" />
  <style>
    /* Gaya CSS sesuai dengan kode Anda */
  </style>
</head>

<body class="bg-nav">
  <div class="absolute top-0 left-1/2 w-full text-white -translate-x-1/2 z-50"></div>

  <div class="sidebar" id="sidebar">
    <a href="#">Profile</a>
    <a href="Setting.php">Setting</a>
    <a href="pemilik.php">Start Selling</a>
    <a href="logout.php">Log Out</a>
  </div>
  <div class="overlay" id="overlay"></div>

  <section>
    <h1>Edit Catering Package</h1>
    <form method="post" action="">
      <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $package['name']; ?>" required>
      </div>
      <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" required><?php echo $package['description']; ?></textarea>
      </div>
      <div>
        <label for="cost">Cost</label>
        <input type="number" id="cost" name="cost" value="<?php echo $package['cost']; ?>" required>
      </div>
      <button type="submit">Update Package</button>
    </form>
  </section>

  <?php include "layout/footer.php"; ?>

  <script src="./../node_modules/preline/dist/preline.js"></script>
  <script>
    const toggleBtn = document.getElementById("toggle-btn");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("active");
      overlay.classList.toggle("active");
      document.body.classList.toggle("body-lock-scroll");
    });

    overlay.addEventListener("click", () => {
      sidebar.classList.remove("active");
      overlay.classList.remove("active");
      document.body.classList.remove("body-lock-scroll");
    });
  </script>
</body>

</html>