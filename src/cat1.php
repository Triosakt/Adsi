<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: logins.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM catering_packages WHERE id='$id'";
$result = $conn->query($sql);
$package = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket Catering I - EventGear Alat Pesta</title>
    <style>
        /* Your existing styles */
    </style>
</head>

<body>
    <header>
        <!-- Your existing header code -->
    </header>
    <nav>
        <!-- Your existing nav code -->
    </nav>
    <div class="container">
        <div class="package-header">
            <img src="./asset/icons/PKT<?php echo $package['id']; ?>.png" alt="Paket Catering">
            <div class="package-details">
                <h2><?php echo $package['name']; ?></h2>
                <p>Rp. <?php echo number_format($package['price'], 2); ?></p>
                <a href="#" class="order-button" onclick="window.location.href = 'Pembayaranform.php';">Order</a>
            </div>
        </div>
        <div class="description">
            <h3>DETAILS <?php echo strtoupper($package['name']); ?></h3>
            <p><?php echo $package['description']; ?></p>
        </div>
        <form method="POST" action="crud.php">
            <input type="hidden" name="id" value="<?php echo $package['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $package['name']; ?>"><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $package['description']; ?></textarea><br>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $package['price']; ?>"><br>
            <button type="submit">Update</button>
        </form>
        <form method="GET" action="crud.php">
            <input type="hidden" name="delete" value="<?php echo $package['id']; ?>">
            <button type="submit">Delete</button>
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>