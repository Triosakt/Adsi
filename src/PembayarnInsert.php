<?php
include "Koneksi.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $package = $_POST['package'];
    $rental_date = $_POST['rental_date'];

  


    $stmt = $conn->prepare("INSERT INTO rentals (nama, phone_number, address, package, rental_date, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    
   
    $stmt->bind_param("sssss", $nama, $phone_number, $address, $package, $rental_date);

    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
