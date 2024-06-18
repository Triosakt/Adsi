<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: logins.php");
    exit();
}

$id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaranakun";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM catering_packages WHERE id='$id'";
$result = $conn->query($sql);
$package = $result->fetch_assoc();

// Jika paket tidak ditemukan di database, coba cari di paket default
if (!$package) {
    $package = $defaultPackages[$id] ?? null;
}

if (!$package) {
    die("Paket tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket Catering - EventGear Alat Pesta</title>
    <link rel="stylesheet" href="asset/css/styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
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
            display: flex;
            justify-content: flex-start;
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

        .form-container {
            background-color: #FFF3CD;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #730000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #5a0000;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="./asset/logo.png" alt="EventGear Logo">
            <h1>Make Your Party Unforgettable with the <br> Best Selection!</h1>
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
            <img src='./asset/icons/PKT1.png' alt="haluluya">
            <div class="package-details">
                <h2 id="package-name"><?php echo $package['name']; ?></h2>
                <p id="package-price">Rp. <?php echo number_format($package['price'], 2); ?></p>
                <a href="#" class="order-button" onclick="window.location.href = 'Pembayaranform.php';">Order</a>
            </div>
        </div>
        <div class="description">
            <h3 id="package-description-title">DETAILS <?php echo strtoupper($package['name']); ?></h3>
            <p id="package-description"><?php echo $package['description']; ?></p>
        </div>
        <div class="form-container">
            <form method="POST" id="update-form">
                <input type="hidden" name="id" value="<?php echo $package['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $package['name']; ?>">
                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $package['description']; ?></textarea>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $package['price']; ?>">
                <button type="submit" id="update-button">Update</button>
                <button type="button" id="delete-button">Delete</button>
            </form>
        </div>
    </div>
</body>
<script>
    document.getElementById('update-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form from submitting normally
        const formData = new FormData(this);
        fetch('crud.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data); // Show server response
                location.reload(); // Optionally, reload the page to reflect changes
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    document.getElementById('delete-button').addEventListener('click', function () {
        if (confirm('Apakah Anda yakin ingin menghapus paket ini?')) {
            const formData = new FormData();
            formData.append('delete', <?php echo $package['id']; ?>);

            fetch('crud.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show server response
                    window.location.href = 'package_detail.php?id=<?php echo $package['id']; ?>'; // Redirect back to package detail page
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
</script>

</html>
<?php
$conn->close();
?>
