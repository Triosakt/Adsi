<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #FFF2CC;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: auto;
      padding: 20px;
    }

    .header {
      background-color: #8B0000;
      color: white;
      padding: 10px;
      text-align: center;
    }

    .header h1 {
      margin: 0;
    }

    .order-table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    .order-table th,
    .order-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .order-table th {
      background-color: #8B0000;
      color: white;
    }

    .checkmark {
      color: green;
    }

    .crossmark {
      color: red;
    }

    .back-button {
      display: block;
      width: 100px;
      margin: 20px auto;
      padding: 10px;
      background-color: #8B0000;
      color: white;
      border: none;
      cursor: pointer;
      text-align: center;
    }

    .footer {
      display: flex;
      justify-content: space-around;
      padding: 20px 0;
      border-top: 1px solid #ddd;
      margin-top: 20px;
    }

    .footer div {
      width: 30%;
    }

    .footer h2 {
      margin-bottom: 10px;
    }

    .footer p {
      margin: 5px 0;
    }

    .footer a {
      text-decoration: none;
      color: #8B0000;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .message {
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #8B0000;
      background-color: #FFD2D2;
      color: #8B0000;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Order Confirmation</h1>
    </div>

    <?php
    session_start();
    if (isset($_SESSION['message'])) {
      echo "<div class='message'>" . $_SESSION['message'] . "</div>";
      unset($_SESSION['message']);
    }
    ?>

    <table class="order-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Telephone</th>
          <th>Address</th>
          <th>Packages</th>
          <th>Rental Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Koneksi ke database
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

        // Mengambil data dari tabel
        $sql = "SELECT id, name, phone_number, address, package, rental_date, status FROM rentals";
        $result = $conn->query($sql);

        if (!$result) {
          die("Query gagal: " . $conn->error);
        }

        if ($result->num_rows > 0) {
          // Output data setiap baris
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["phone_number"] . "</td>
                        <td>" . $row["address"] . "</td>
                        <td>" . $row["package"] . "</td>
                        <td>" . $row["rental_date"] . "</td>
                        <td>
                          <form action='update_status.php' method='POST'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <select name='status' onchange='this.form.submit()'>
                              <option value='Diterima'" . ($row["status"] == 'Diterima' ? " selected" : "") . ">Diterima</option>
                              <option value='Tidak Diterima'" . ($row["status"] == 'Tidak Diterima' ? " selected" : "") . ">Tidak Diterima</option>
                            </select>
                          </form>
                        </td>
                      </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No orders found</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>

    <button class="back-button" onclick="window.history.back();">BACK</button>

    <div class="footer">
      <div class="contact-info">
        <h2>EventGear Contact</h2>
        <p>📞 087899248741</p>
        <p>📞 081368982664 | 082269688481</p>
        <p>📱 0895640121372</p>
        <p>✉️ eventgear.alatpesta@gmail.com</p>
      </div>
      <div class="address">
        <h2>Address</h2>
        <p>Kemiling Permai, Kec. Kemiling, Kota Bandar Lampung, Lampung 35151</p>
      </div>
      <div class="social-media">
        <h2>Join With Us</h2>
        <p>
          <a href="#">Facebook</a> |
          <a href="#">Twitter</a> |
          <a href="#">Instagram</a> |
          <a href="#">YouTube</a> |
          <a href="#">WhatsApp</a>
        </p>
      </div>
    </div>
  </div>
</body>

</html>