<?php
    include 'koneksi.php';

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $isi_pesan = $_POST['isi'];

    $query = "INSERT INTO db_bukutamu (nama, email, isi) VALUES ('$nama', '$email', '$isi')";
    $sql = mysqli_query($conn, $query);

    if($sql){
        echo "Pesan berhasil dikirim. Terima kasih atas kunjungan Anda.";
    } else {
        echo "Pesan gagal dikirim. Silahkan coba lagi.";
    }
?>
