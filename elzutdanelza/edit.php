<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $id = $_POST['id'];
    $nama_guru = $_POST['nama_guru'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $nip = $_POST['nip'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];

    // Update data di database
    $query = "UPDATE kepala_sekolah SET
        nama_guru='$nama_guru',
        mata_pelajaran='$mata_pelajaran',
        no_hp='$no_hp',
        email='$email',
        nip='$nip',
        jenis_kelamin='$jenis_kelamin',
        alamat='$alamat',
        umur='$umur'
        WHERE id=$id";
    $result = $koneksi->query($query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    // Tampilkan data yang akan di-edit
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
        die("Invalid ID: " . $_GET['id']);
    }

    $query = "SELECT * FROM kepala_sekolah WHERE id=$id";
    $result = $koneksi->query($query);

    if (!$result || $result->num_rows == 0) {
        die("Data not found");
    }

    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data</h2>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <!-- Tampilkan data yang akan di-edit dan tambahkan input untuk data lainnya -->

        <label for="nama_guru">Nama Guru:</label>
        <input type="text" name="nama_guru" value="<?php echo $row['nama_guru']; ?>" required>
        <label for="no_hp">Mata Pelajaran:</label>
        <input type="text" name="mata_pelajaran" value="<?php echo $row['mata_pelajaran']; ?>" required>
        <label for="no_hp">No Handphone:</label>
        <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
        <label for="nip">NIP:</label>
        <input type="text" name="nip" value="<?php echo $row['nip']; ?>" required>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" required>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
        <label for="umur">Umur:</label>
        <input type="file" name="umur" value="<?php echo $row['umur']; ?>" required>
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