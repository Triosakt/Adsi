<?php
include "Koneksi.php";
var_dump($_POST);
if (isset($_POST["submit"])) {
    $storename = htmlspecialchars($_POST["storename"]);
    $storeaddress = htmlspecialchars($_POST["storeaddress"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);

    $sql = "INSERT INTO stores (store_name, store_address, email, phone_number) VALUES ('$storename', '$storeaddress', '$email', '$phone')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        
        header("Location: cataloguePenjual.php");
        exit();
    } else {
        echo "<script>alert('Gagal menambahkan data');</script>";
    }
}
