<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: logins.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaranakun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Create and Update operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        // Handle Delete operation
        $id = $_POST['delete'];
        $sql = "DELETE FROM catering_packages WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Handle Create and Update operations
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if (isset($_POST['id'])) {
            // Update existing package
            $id = $_POST['id'];
            $sql = "UPDATE catering_packages SET name='$name', description='$description', price='$price' WHERE id='$id'";
        } else {
            // Create new package
            $sql = "INSERT INTO catering_packages (name, description, price) VALUES ('$name', '$description', '$price')";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();