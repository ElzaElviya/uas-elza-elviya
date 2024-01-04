<?php
include 'koneksi.php';

// Read Data
$query = "SELECT * FROM kepala_sekolah";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah SMA Negeri 8 Jambi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Guru Sekolah</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>No Handphone</th>
            <th>Email</th>
            <th>NIP</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Umur</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_guru'] . "</td>";
            echo "<td>" . $row['mata_pelajaran'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['nip'] . "</td>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td><img src='upload/" . $row['umur'] . "' alt='Sosial Media Image' width='200'></td>";
            // Tambahkan kolom lain sesuai kebutuhan
            echo "<td>
                      <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                      <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

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
    <a href="create.php" class="button">Tambah Data Baru</a>

</body>
</html