<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaranakun";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$id = $_POST['id'];
$status = $_POST['status'];

// SQL untuk memperbarui status
$sql = "UPDATE rentals SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Status berhasil diperbarui";
} else {
    $_SESSION['message'] = "Error: " . $conn->error;
}

$conn->close();

// Kembali ke halaman order_confirmation.php
header("Location: OrderConfirmation.php");
exit();