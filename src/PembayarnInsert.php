<?php
  include "Koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_telephone = $_POST['no_telephone'];
    $alamat = $_POST['alamat'];
    $paket_sewa = $_POST['paket_sewa'];
    $tanggal_sewa = $_POST['tanggal_sewa'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rentals";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("INSERT INTO rentals (name, phone_number, address, package, rental_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $no_telephone, $alamat, $paket_sewa, $tanggal_sewa);


    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>
