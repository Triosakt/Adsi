<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulir Kontak</title>
  <link rel="stylesheet" href="./output.css">
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #feeec5;
    }

    .containers {
      width: 500px;
      margin: 50px auto 100px;
      /* top right bottom left */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    input[type="date"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      border: none;
    }

    input[type="text"]::placeholder,
    input[type="date"]::placeholder,
    select::placeholder {
      color: #999;
    }

    .button-group {
      text-align: center;
    }

    button {
      padding: 10px 20px;
      background-color: #6f0b0b;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #6f0b0b;
    }

    button:disabled {
      background-color: #ccc;
      cursor: default;
    }

    header {
      padding: 20px;
      background-color: #6f0b0b;
      border-bottom: 1px solid #ccc;
      color: white;
    }

    header h2 {
      margin-bottom: 10px;
    }

    header h3 {
      margin: 0;
      color: white;
      font-weight: bold;
      font-size: 1.2em;
      /* Make the text larger */
    }

    header h2 {
      font-size: 1.5em;
      /* Make the text smaller */
      font-weight: bold;
    }

    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }

    .popup-content {
      background-color: #6f0b0b;
      padding: 40px;
      border-radius: 30px;
      /* Increased border radius */
      text-align: center;
      width: 400px;
      color: #feeec5;
    }

    .popup-content h2 {
      margin: 0 0 20px;
      font-size: 1.5em;
      color: #feeec5;
    }

    .popup-content button {
      padding: 10px 20px;
      margin: 10px;
      background-color: #feeec5;
      color: black;
      /* Changed text color to black */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      /* Made text bold */
    }

    .popup-content button:hover {
      background-color: #f2d7a5;
    }
  </style>
</head>

<body>
  <header>
    <h2>COMPLETE THE DATA BELOW!</h2>
    <h3>To continue the payment process</h3>
  </header>

  <div class="containers">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Konfigurasi database
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
      $nama = $_POST['nama'];
      $no_telephone = $_POST['no_telephone'];
      $alamat = $_POST['alamat'];
      $paket_sewa = $_POST['paket_sewa'];
      $tanggal_sewa = $_POST['tanggal_sewa'];

      // SQL untuk memasukkan data ke tabel
      $sql = "INSERT INTO rentals (name, phone_number, address, package, rental_date) VALUES ('$nama', '$no_telephone', '$alamat', '$paket_sewa', '$tanggal_sewa')";

      if ($conn->query($sql) === TRUE) {
        echo "<p>Data berhasil disimpan. Mengarahkan ke halaman pembayaran...</p>";
        echo "<script>setTimeout(function() { window.location.href = 'Melakukanpembayaran.php'; }, 2000);</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Menutup koneksi
      $conn->close();
    }
    ?>

    <form id="contactForm" action="" method="POST">
      <div class="input-group">
        <input type="text" id="nama" name="nama" placeholder="Name" required />
      </div>

      <div class="input-group">
        <input type="text" id="no_telephone" name="no_telephone" placeholder="Enter your telephone number" required />
      </div>

      <div class="input-group">
        <input type="text" id="alamat" name="alamat" placeholder="Address" required />
      </div>

      <div class="input-group">
        <select id="paket_sewa" name="paket_sewa" required>
          <option value="" disabled selected>Select package</option>
          <option value="paket1">Package Cathering 1</option>
          <option value="paket1">Package Cathering 2</option>
          <option value="paket1">Package Cathering 3</option>
          <option value="paket1">Package Cathering 4</option>
          <option value="paket1">Package Wedding 1</option>
          <option value="paket1">Package Wedding 2</option>
          <option value="paket1">Package Wedding 3</option>
          <option value="paket1">Package Wedding 4</option>
          <option value="paket1">Package Birtday 1</option>
          <option value="paket1">Package Birtday 2</option>
          <option value="paket1">Package Birtday 3</option>
          <option value="paket1">Package Birtday 4</option>
          
        </select>
      </div>

      <div class="input-group">
        <label for="tanggal_sewa">Rental date</label>
        <input type="date" id="tanggal_sewa" name="tanggal_sewa" required />
      </div>

      <div class="button-group">
        <button type="button" onclick="cancelForm()">CANCEL</button>
        <button type="submit">NEXT</button>
      </div>
    </form>
  </div>

  <div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
      <h2>Is your data correct?</h2>
      <button onclick="document.getElementById('contactForm').submit();">Yes</button>
      <button onclick="hidePopup()">No</button>
    </div>
  </div>

  <script>
    function showPopup() {
      document.getElementById('popupOverlay').style.display = 'flex';
    }

    function hidePopup() {
      document.getElementById('popupOverlay').style.display = 'none';
    }

    function cancelForm() {
      document.getElementById('contactForm').reset();
    }
  </script>
</body>

</html>