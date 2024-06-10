<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="./output.css" />
    <style>
        body {
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #FFF3CD
        }

        section {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .buttons {
            margin-top: 20%;
            display: flex;
            gap: 20px;
        }

        .button {
            background-color: #FFF3CD;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #7a7a7a;
        }

        .profile-picture img {
            width: 150px; 
            height: 150px; 
            object-fit: cover;
            border-radius: 50%; 
        }
        .bg-primary{
            background-color: #6F0B0B;
        }
    </style>
</head>

<body>
    <section>
        <div class="w-1/2 bg-primary rounded-3xl mt-10 mb-10 px-4 py-16 flex flex-col items-center">
            <div class="profile-picture">
                <img src="./asset/icons/owner.jpg" alt="Foto Profil" >
            </div>
            <div class="buttons">
            <a href="PerbaruiProfil.php" class="button">Edit</a>
            <a href="index.php" class="button">Home</a>
            </div>
        </div>
    </section>
    <?php include "layout/footer.php"; ?>
</body>

</html>