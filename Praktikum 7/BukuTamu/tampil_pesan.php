<?php
    // Menghubungkan dengan file koneksi.php
    include 'koneksi.php';

    // Query untuk menampilkan data buku tamu dari database
    $query = "SELECT * FROM db_bukutamu";
    $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampil Pesan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Pesan Buku Tamu</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Isi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                while($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['isi']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
