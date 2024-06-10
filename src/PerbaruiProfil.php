<?php
include("Koneksi.php");
session_start();

// Pastikan pengguna sudah login
if(!isset($_SESSION['login'])) {
    header("Location: logins.php");
    exit();
}

$user = $_SESSION['login'];

// Menyimpan perubahan profil
if(isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $userId = isset($user['id']) ? $user['id'] : 0; // Pastikan kolom 'id' ada di tabel 'pengguna'

    // Update data pengguna di database
    if ($userId != 0) {
        $stmt = $conn->prepare("UPDATE pengguna SET nama = ?, email = ?, no_telephone = ?, alamat = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $userId);

        if($stmt->execute()) {
            // Update data dalam session
            $_SESSION['login']['nama'] = $name;
            $_SESSION['login']['email'] = $email;
            $_SESSION['login']['no_telpone'] = $phone;
            $_SESSION['login']['alamat'] = $address;
            header("Location: PerbaruiProfil.php?success=1");
        } else {
            header("Location: PerbaruiProfil.php?error=1");
        }
    } else {
        header("Location: PerbaruiProfil.php?error=1");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="./output.css" />
    <script>
        function saveProfile() {
            // Mengambil nilai dari elemen formulir
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;

            // Kirim data ke server menggunakan AJAX atau fetch API
            // Misalnya, Anda dapat menggunakan fetch API seperti ini:
            fetch('PerbaruiProfil.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    phone: phone,
                    address: address
                }),
            })
            .then(response => {
                if (response.ok) {
                    // Handle jika berhasil
                    console.log('Profile updated successfully!');
                    // Redirect or display success message
                } else {
                    // Handle jika gagal
                    console.error('Failed to update profile');
                    // Redirect or display error message
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
    <style>
        body {
            background-color: #f7e3b5;
            font-family: Arial, sans-serif;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-section {
           
            border-radius: 10px;
            padding: 20px;            
        }

        .header {
            background-color: #b8a6a5;
            border-radius: 10px 10px 10px 10px;
            text-align: center;
            width: 500px;
            height: 50px;
        }

        .header h1 {
            margin: 0;
            color: white;
            font-size: 30px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            box-sizing: 10px;
            margin-left: 40px;
            margin-right: 40px;
            
        }

        label {
            color: white;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .buttons {
            display: flex;
            margin-top: 20px;
        }

        .button {
            background-color: #7d2b27;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .button.save:hover {
            background-color: #6b2420;
        }

        .button.cancel:hover {
            background-color: #6b2420;
        }

        .button.save {
            margin-right: 10px; /* Tambahkan jarak ke kanan */
        }

        .button.cancel {
            margin-left: 10px; /* Tambahkan jarak ke kiri */
        }
        .profile-picture img {
            width: 150px; 
            height: 150px; 
            object-fit: cover;
            border-radius: 50%;
        }


    </style>
</head>
<body>
    <section>
        <div class="mt-10 pb-20 flex justify-center gap-x-10 px-12">
            
    <div class="bg-primary rounded-3xl px-4">
    <div class="header">
                <h1>PROFILE</h1>
            </div>
                
        <div class="profile-section">
            <?php
            if(isset($_GET['success'])) {
                echo "<p style='color:green;'>Profile updated successfully!</p>";
            }
            if(isset($_GET['error'])) {
                echo "<p style='color:red;'>Failed to update profile. Please try again.</p>";
            }
            ?>
            <form method="post" action="PerbaruiProfil.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars(isset($user['nama']) ? $user['nama'] : ''); ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars(isset($user['email']) ? $user['email'] : ''); ?>">

                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars(isset($user['no_telpone']) ? $user['no_telpone'] : ''); ?>">

                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars(isset($user['alamat']) ? $user['alamat'] : ''); ?>">
                <div class="flex flex-col items-center">
                <div class="profile-picture">
                    <img src="./asset/logo2.png" alt="Profile Picture">
                </div>
                 <div class="buttons">
                    <button type="submit" name="submit" class="button save">Save</button>
                    <button type="button" class="button cancel" onclick="window.location.href='index.php'">Cancel</button>
                </div>

            </form>
        </div>
    </div>
        
        </section>
       
    
    <?php include "layout/footer.php"; ?>
    
</body>
</html>
