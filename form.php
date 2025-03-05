<html>
  <head>
    <title>Pengolahan Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f9;
      }
      .form-container {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .form-container h2 {
        text-align: center;
        color: #333;
      }
      .form-container label {
        font-size: 14px;
        color: #555;
      }
      .form-container input[type="text"], .form-container select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
      }
      .form-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
      }
      .form-container input[type="submit"]:hover {
        background-color: #45a049;
      }
      .result-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .result-container h3 {
        text-align: center;
        color: #333;
      }
      .result-container .result-item {
        margin: 10px 0;
        font-size: 16px;
        color: #555;
      }
      .result-container .result-item b {
        color: #333;
      }
    </style>
  </head>
  <body>

    <!-- Form Input -->
    <div class="form-container">
      <h2>Form Pengolahan Data</h2>
      <form action="" method="POST" name="input">
        <label for="nama">Nama Anda:</label>
        <input type="text" id="nama" name="nama" required><br>
        
        <label for="nim">NIM Anda:</label>
        <input type="text" id="nim" name="nim" required><br>
        
        <label for="alamat">Alamat Anda:</label>
        <input type="text" id="alamat" name="alamat" required><br>

        <label for="jurusan">Jurusan Anda:</label>
        <select name="jurusan" id="jurusan" required>
          <option value="">Pilih Jurusan</option>
          <option value="Teknik Informatika">Teknik Informatika</option>
          <option value="Sistem Informasi">Sistem Informasi</option>
          <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          <option value="Manajemen">Manajemen</option>
          <option value="Akuntansi">Akuntansi</option>
        </select><br>

        <input type="submit" name="Pilih" value="Input">
      </form>
    </div>

    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root"; // Ganti dengan username MySQL Anda
    $password = ""; // Ganti dengan password MySQL Anda
    $dbname = "form_data"; // Nama database yang telah dibuat

    // Membuat koneksi ke MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Mengecek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if (isset($_POST['Pilih'])) {
      // Mengambil nilai input dari form
      $nama = $_POST['nama'];
      $nim = $_POST['nim'];
      $alamat = $_POST['alamat'];
      $jurusan = $_POST['jurusan'];

      // Menyimpan data ke dalam database menggunakan INSERT INTO
      $sql = "INSERT INTO users (nama, nim, alamat, jurusan) VALUES ('$nama', '$nim', '$alamat', '$jurusan')";

      if ($conn->query($sql) === TRUE) {
          echo "<div class='result-container'>";
          echo "<h3>Hasil Pengolahan Data:</h3>";
          echo "<div class='result-item'>Nama Anda: <b>$nama</b></div>";
          echo "<div class='result-item'>NIM Anda: <b>$nim</b></div>";
          echo "<div class='result-item'>Alamat Anda: <b>$alamat</b></div>";
          echo "<div class='result-item'>Jurusan Anda: <b><font color='red'>$jurusan</font></b></div>";
          echo "<div class='result-item'>Data berhasil disimpan ke database!</div>";
          echo "</div>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    // Menutup koneksi
    $conn->close();
    ?>

  </body>
</html>
