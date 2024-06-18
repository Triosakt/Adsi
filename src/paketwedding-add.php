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

$sql = "SELECT * FROM catering_packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./output.css" />
    <style>
        body {
            background-color: #800000;
            color: #000;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .form-container {
            background-color: #f5deb3;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #800000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #a52a2a;
        }

        #add-package-btn {
            background-color: #800000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            /* Centers the button */
        }

        #add-package-btn:hover {
            background-color: #a52a2a;
        }
    </style>
</head>

<body class="bg-nav">
    <div class="absolute top-0 left-1/2 w-full text-black -translate-x-1/2 z-50">
        <?php include "layout/header.php"; ?>
        <section>
            <div class="mt-10 pb-20 flex justify-center gap-x-10 px-12" id="package-container">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="w-1/2 bg-primary rounded-3xl px-4 py-16"
                        onclick="location.href='package_detail.php?id=<?php echo $row['id']; ?>';" style="cursor: pointer;">
                        <h1 class="text-white font-bold text-center text-2xl mb-5"><?php echo $row['name']; ?></h1>
                        <img class="mx-auto" src="./asset/icons/PKT<?php echo $row['id']; ?>.png" alt="">
                        <p class="text-white text-center mt-10 max-w-[26.75rem] text-xl mx-auto">GET</p>
                    </div>
                <?php endwhile; ?>
            </div>
            <button id="add-package-btn">Tambah Paket</button>
            <div id="new-package-form" class="form-container" style="display: none;">
                <label for="new-name">Name:</label>
                <input type="text" id="new-name" name="new-name">
                <label for="new-description">Description:</label>
                <textarea id="new-description" name="new-description"></textarea>
                <label for="new-price">Price:</label>
                <input type="text" id="new-price" name="new-price">
                <button id="save-package-btn">Save</button>
            </div>
        </section>
        <?php include "layout/footer.php"; ?>
        <script src="asset/js/packages.js"></script>
    </div>





</body>

</html>

<?php
$conn->close();
?>