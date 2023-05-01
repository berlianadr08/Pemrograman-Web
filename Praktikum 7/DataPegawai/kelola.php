<!DOCTYPE html>

<?php
    include 'koneksi.php';

        $id_pegawai = '';
        $nik = '';
        $nama_pegawai = '';
        $jenis_kelamin = '';
        $alamat = '';


    if(isset($_GET['ubah'])){
        $id_pegawai = $_GET['ubah'];
        
        $query = "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id_pegawai';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nik = $result['nik'];
        $nama_pegawai = $result['nama_pegawai'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result['alamat'];

        //var_dump($result);
        //die();
    }
?>

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
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Kantor
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_pegawai; ?>" name="id_pegawai">
        <div class="mb-3 row">
            <label for="nik" class="col-sm-2 col-form-label">
                NIK
            </label>
            <div class="col-sm-10">
                <input required type="text" name="nik" class="form-control" id="nik" placeholder="Ex: 12345678910" value="<?php echo $nik; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">
                Nama Pegawai
            </label>
            <div class="col-sm-10">
                <input required type="text" name="nama_pegawai" class="form-control" id="nama" placeholder="Ex: Susanti" value="<?php echo $nama_pegawai; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jkel" class="col-sm-2 col-form-label">
                Jenis Kelamin
            </label>
            <div class="col-sm-10">
                <select required id="jkel" name="jenis_kelamin" class="form-select">
                    <option <?php if($jenis_kelamin == 'Laki-laki'){ echo "selected";} ?> value="Laki - Laki">Laki - Laki</option>
                    <option <?php if($jenis_kelamin == 'Perempuan'){ echo "selected";} ?> value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">
                Foto Pegawai
            </label>
            <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="foto" id="foto" accept="image/">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">
                Alamat Lengkap
            </label>
            <div class="col-sm-10">
                <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
            </div>
        </div>
        <div class="mb-3 row mt-4">
            <div class="col">
                <?php
                    if(isset($_GET['ubah'])){
                ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                <?php
                    } else {
                ?>
                    <button type="submit" name="aksi" type="submit" value="add" class="btn btn-primary">
                        Tambahkan
                    </button>
                <?php
                    }
                ?>
                <a href="index.php" type="button" class="btn btn-danger">
                    Batal
                </a>
            </div>
        </div>
        </form>
    </div>
</body>

</html>