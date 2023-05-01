<?php
    
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $nik = $_POST['nik'];
            $nama_pegawai = $_POST['nama_pegawai'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $foto = $_FILES['foto']['name'];
            $alamat = $_POST['alamat'];

            $dir = "img/";
            $tmpFile = $_FILES['foto']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$foto);

            //die();

            $query = "INSERT INTO tb_pegawai VALUES(null, '$nik', '$nama_pegawai', '$jenis_kelamin', '$foto', '$alamat')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                //echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
            } else {
                echo $query;
            }

            //echo $nik." | ".$nama_pegawai." | ".$jenis_kelamin." | ".$foto." | ".$alamat;

            //echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
        } elseif ($_POST['aksi'] == "edit"){
            //echo "Edit Data <a href='index.php'>[Home]</a>";
            //var_dump($_POST);

            $id_pegawai = $_POST['id_pegawai'];
            $nik = $_POST['nik'];
            $nama_pegawai = $_POST['nama_pegawai'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];

            $queryShow = "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id_pegawai';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['foto']['name'] == ""){
                $foto = $result['foto_pegawai'];
            } else {
                $foto = $_FILES['foto']['name'];
                unlink("img/".$result['foto_pegawai']);
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']);
            }

            $query = "UPDATE tb_pegawai SET nik='$nik', nama_pegawai='$nama_pegawai', jenis_kelamin
                ='$jenis_kelamin', alamat='$alamat', foto_pegawai='$foto' WHERE id_pegawai='$id_pegawai';";
            $sql = mysqli_query($conn, $query);
            header("location: index.php");
        }
    }

    if(isset($_GET['hapus'])){
        $id_pegawai = $_GET['hapus'];

        $queryShow = "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id_pegawai';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        //var_dump($sqlShow);
        
        unlink("img/".$result['foto_pegawai']);
        
        $query = "DELETE FROM tb_pegawai WHERE id_pegawai = '$id_pegawai';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: index.php");
        //echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }

        
        //echo "Hapus Data <a href='index.php'>[Home]</a>";

    }
?>