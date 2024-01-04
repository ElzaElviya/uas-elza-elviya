<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama_guru = $_POST['nama_guru'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $nip = $_POST['nip'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];

    $query = "INSERT INTO kepala_sekolah (nama_guru, mata_pelajaran, no_hp, email, nip, jenis_kelamin, alamat, umur) 
              VALUES ('$nama_guru', '$mata_pelajaran', '$no_hp', '$email', '$nip', '$jenis_kelamin', '$alamat', '$umur')";
    $result = $koneksi->query($query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Baru</h2>

    <form method="POST" action="">
        <!-- Tambahkan formulir sesuai kebutuhan -->
        <label for="nama_guru">Nama Guru          :</label>
        <input type="text" name="nama_guru" required>
        <label for="mata_pelajaran">Mata Pelajaran        :</label>
        <input type="text" name="mata_pelajaran" required>
        <label for="no_hp">No. Handphone            :</label>
        <input type="text" name="no_hp" required>
        <label for="email">Email   :</label>
        <input type="text" name="email" required>
        <label for="nip">NIP   :</label>
        <input type="text" name="nip" required>
        <label for="jenis_kelamin">Jenis Kelamin   :</label>
        <input type="text" name="jenis_kelamin" required>
        <label for="alamat">Alamat  :</label>
        <input type="text" name="alamat" required>
        <label for="umur">Umur   :</label>
        <input type="file" name="umur" required>

        <br>

        <!-- Tambahkan input untuk data lainnya -->

        <br>

        <input type="submit" value="Simpan">
    </form>

    <br>
    <br>

        <!-- Tambahkan tombol untuk download dan cetak -->
        <a href="download.php?id=<?php echo $row['id']; ?>" class="button">Download</a>
        <input type="button" value="Cetak" onclick="printData()">

        <script>
            function printData() {
                window.print();
            }
        </script>

        <br>
    
    <a href="index.php" class="Button">Kembali</a>

</body>
</html>