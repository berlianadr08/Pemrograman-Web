<?php
    include 'koneksi.php';

    $query = "SELECT * FROM tb_pegawai;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    
    <title>Data Pegawai</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Kantor
            </a>
        </div>
    </nav>

    <!-- Judul -->
    <div class="container">
        <h1 class="mt-4">Data Pegawai</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data yang telah disimpan di database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Pegawai <cite title="Source Title">dapat mengisi data pribadi masing - masing</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>No.</center></th>
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     while($result = mysqli_fetch_assoc($sql)){
                ?>
                    <tr>
                    <td><center>
                        <?php echo ++$no; ?>.
                    </center></td>
                    <td>
                        <?php echo $result['nik']; ?>
                    </td>
                    <td>
                        <?php echo $result['nama_pegawai']; ?>
                    </td>
                    <td>
                        <?php echo $result['jenis_kelamin']; ?>
                    </td>
                    <td>
                        <img src="img/<?php echo $result['foto_pegawai']; ?>" style="width: 150px;">
                    </td>
                    <td>
                        <?php echo $result['alamat']; ?>
                    </td>
                    <td>
                        <a href="kelola.php?ubah=<?php echo $result['id_pegawai']; ?>" type="button" class="btn btn-success btn-sm">
                            Ubah
                        </a>
                        <a href="proses.php?hapus=<?php echo $result['id_pegawai']; ?>" type="button" class="btn btn-danger btn-sm" 
                        onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                            Hapus
                        </a>
                    </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
                </table>
                </div>
                </div>
</body>
</html>