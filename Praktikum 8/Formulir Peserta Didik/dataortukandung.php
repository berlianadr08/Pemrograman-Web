<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>

    <!-- import bootsrap css via cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .warning {color:#FF0000;}
    </style>
</head>
<body>

<?php
// varibel isi inputan 
{
    $namaayah="";
    $tahunayah="";
    $pendidikanayah="";
    $pekerjaanayah="";
    $penghasilanayah="";
    $kebutuhankhususayah="";
    $namaibu="";
    $tahunibu="";
    $pendidikanibu="";
    $pekerjaanibu="";
    $penghasilanibu="";
    $kebutuhankhususibu="";
}
// variabel eror 
{
    $errornamaayah="";
    $errortahunayah="";
    $errorpendidikanayah="";
    $errorpekerjaanayah="";
    $errorpenghasilanayah="";
    $errorkebutuhankhususayah="";
    $errornamaibu="";
    $errortahunibu="";
    $errorpendidikanibu="";
    $errorpekerjaanibu="";
    $errorpenghasilanibu="";
    $errorkebutuhankhususibu="";
}
// validasi isi form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
     //namaayah
     {
        if (empty($_POST["namaayah"])) {
            $errornamaayah = "Nama ayah tidak boleh kosong";
        }
        else {
            $namaayah = cek_input($_POST["namaayah"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $namaayah)) 
            {
              
                $errornamaayah = "Inputan hanya boleh huruf dan spasi";
            }else{
                $errornamaayah="";
            }
        }
    }
    //namaibu
    {
        if (empty($_POST["namaibu"])) {
            $errornamaibu= "Nama IBU tidak boleh kosong";
        }
        else {
            $namaibu = cek_input($_POST["namaibu"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $namaibu)) 
            {
              
                $errornamaibu = "Inputan hanya boleh huruf dan spasi";
            }else{
                $errornamaibu="";
            }
        }
    }
    //tahunayah
    {
        if(empty($_POST["tahunayah"])){
            $errortahunayah="Tahun Lahir Ayah tidak boleh kosong";
        }
        else{
            $tahunayah=cek_input($_POST["tahunayah"]);
            if(!is_numeric($tahunayah)){
                $errortahunayah="Tahun lahir ayah hanya boleh berisi angka";
            }else{
                $errortahunayah="";
            }
        }
    }
    //tahun ibu
    {
        if(empty($_POST["tahunibu"])){
            $errortahunibu="Tahun Lahir Ibu tidak boleh kosong";
        }
        else{
            $tahunibu=cek_input($_POST["tahunibu"]);
            if(!is_numeric($tahunibu)){
                $errortahunibu="Tahun lahir ibu hanya boleh berisi angka";
            }else{
                $errortahunibu="";
            }
        }
    }
    //gmail
    {
        if(empty($_POST["mail"])){
            $errormail="Email tidak boleh kosong";
        }
        else{
            $mail=cek_input($_POST["mail"]);
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $errormail="Format Email Invalid";
            }
            else{
                $errormail="";
            }
        }
    }
    //warganegara
    {
        if(empty($_POST["wn"])){
            $errorkewarganegaraan = "pilihan harus di pilih";
        }else{
            $kewarganegaraan=cek_input($_POST["wn"]);
            $errorkewarganegaraan="";
        }
    }
    //kip
    {
        if(empty($_POST["kip"])){
            $errorpenerimapkh = "pilihan harus di pilih";
        }else{
            $penerimapkh =cek_input($_POST["kip"]);
            $errorpenerimapkh="";
        }
    }
    //tempat tinggal
    {
        if (!isset($_POST["tpttinggal"])) {
            $errortempattingal = "Tempat Tinggal harus dipilih";
        }
        else
        {
            $tempattingal = cek_input($_POST["tpttinggal"]);
            if($tempattingal=="Silahkan Pilih"){
                $errortempattingal = "Tempat Tinggal harus dipilih";
            }else{
                $errortempattingal="";
            }
        }
    }
    //transportasi
    {
        if (!isset($_POST["transportasi"])) {
            $errortransportasi = "Moda Transportasi harus dipilih";
        }
        else
        {
            $transportasi = cek_input($_POST["transportasi"]);
            if($transportasi=="Silahkan Pilih"){
                $errortransportasi = "Moda Transportasi harus dipilih";
            }else{
                $errortransportasi="";
            }
        }
    }
    //riwayat pendidikan ayah
    {
        if (!isset($_POST["rwytpendidkanayah"])) {
            $errorpendidikanayah = "riwayat pendidikan ayah harus dipilih";
        }
        else
        {
            $pendidikanayah = cek_input($_POST["rwytpendidkanayah"]);
            if($pendidikanayah=="Silahkan Pilih"){
                $errorpendidikanayah = "riwayat pendidikan ayah harus dipilih";
            }else{
                $errorpendidikanayah="";
            }
        }
    }
    //pekerjaan ayah
    {
        if (!isset($_POST["pekerjaanayah"])) {
            $errorpekerjaanayah = "pekerjaan ayah harus dipilih";
        }
        else
        {
            $pekerjaanayah = cek_input($_POST["pekerjaanayah"]);
            if($pekerjaanayah =="Silahkan Pilih"){
                $errorpekerjaanayah = "pekerjaan ayah harus dipilih";
            }else{
                $errorpekerjaanayah="";
            }
        }
    }
    //penghasilan ayah
    {
        if (!isset($_POST["penghasilanayah"])) {
            $errorpenghasilanayah = "penghasilan ayah harus dipilih";
        }
        else
        {
            $penghasilanayah = cek_input($_POST["penghasilanayah"]);
            if($penghasilanayah =="Silahkan Pilih"){
                $errorpenghasilanayah = "penghasilan ayah harus dipilih";
            }else{
                $errorpenghasilanayah="";
            }
        }
    }
    // kebutuhan khusus ayah 
    {
        if (!isset($_POST["kebutuhankhususayah"])) {
            $errorkebutuhankhususayah = "kebutuhan khusus ayah harus dipilih";
        }
        else
        {
            $kebutuhankhususayah = cek_input($_POST["kebutuhankhususayah"]);
            if($kebutuhankhususayah  =="Silahkan Pilih"){
                $errorkebutuhankhususayah = "kebutuhan khusus ayah harus dipilih";
            }else{
                $errorkebutuhankhususayah="";
            }
        }
    }

     //riwayat pendidikan ibu
     {
        if (!isset($_POST["rwytpendidkanibu"])) {
            $errorpendidikanibu = "riwayat pendidikan ibu harus dipilih";
        }
        else
        {
            $pendidikanibu = cek_input($_POST["rwytpendidkanibu"]);
            if($pendidikanibu=="Silahkan Pilih"){
                $errorpendidikanibu = "riwayat pendidikan ibu harus dipilih";
            }else{
                $errorpendidikanibu="";
            }
        }
    }
    //pekerjaan ibu
    {
        if (!isset($_POST["pekerjaanibu"])) {
            $errorpekerjaanibu = "pekerjaan ibu harus dipilih";
        }
        else
        {
            $pekerjaanibu = cek_input($_POST["pekerjaanibu"]);
            if($pekerjaanibu =="Silahkan Pilih"){
                $errorpekerjaanibu = "pekerjaan ibu harus dipilih";
            }else{
                $errorpekerjaanibu="";
            } 
        }
    }
    //penghasilan ibu
    {
        if (!isset($_POST["penghasilanibu"])) {
            $errorpenghasilanibu = "penghasilan ibu harus dipilih";
        }
        else
        {
            $penghasilanibu = cek_input($_POST["penghasilanibu"]);
            if($penghasilanibu =="Silahkan Pilih"){
                $errorpenghasilanibu = "penghasilan ibu harus dipilih";
            }else{
                $errorpenghasilanibu="";
            }
        }
    }
    //from validasi kebutuhan khusus ibu
    {
        if (!isset($_POST["kebutuhankhususibu"])) {
            $errorkebutuhankhususibu = "kebutuhan khusus ibu harus dipilih";
        }
        else
        {
            $kebutuhankhususibu = cek_input($_POST["kebutuhankhususibu"]);
            if($kebutuhankhususibu  =="Silahkan Pilih"){
                $errorkebutuhankhususibu = "kebutuhan khusus ibu harus dipilih";
            }else{
                $errorkebutuhankhususibu="";
            }
        }
    }

    // pengecekan kondisi apakah ada error dalam pengisian form
    if( $errornamaayah==""&&
    $errortahunayah==""&&
    $errorpendidikanayah==""&&
    $errorpekerjaanayah==""&&
    $errorpenghasilanayah==""&&
    $errorkebutuhankhususayah==""&&
    $errornamaibu==""&&
    $errortahunibu==""&&
    $errorpendidikanibu==""&&
    $errorpekerjaanibu==""&&
    $errorpenghasilanibu==""&&
    $errorkebutuhankhususibu==""
    ){
        //proses memasukan data ke database
        include 'koneksi.php';
        $sql=" INSERT INTO biodata (`nik`, `tanggalisiformulir`, `jenispendaftaran`, `tanggalmasuk`, `nis`, `nomorpendaftaran`, `paud`, `tk`, `skhun`, `ijazah`, `cita`, `hobi`, `nama`, `kelamin`, `nisn`, `tempatlahir`, `tanggallahir`, `agama`, `kebutuhankhusus`, `alamat`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `pos`, `tempattinggal`, `transportasi`, `nohp`, `notlp`, `mail`, `penerimapkh`, `nomorpkh`, `kewarganegaraan`, `negara`, `ayah`, `tahunayah`, `pendidikanayah`, `pekerjaanayah`, `penghasilanayah`, `kebutuhankhususayah`, `ibu`, `tahunibu`, `pendidikanibu`, `pekerjaanibu`, `penghasilanibu`, `kebutuhankhususibu`) VALUES ('$nik', 
        '$namaayah',
        '$tahunayah',
        '$pendidikanayah',
        '$pekerjaanayah',
        '$penghasilanayah',
        '$kebutuhankhususayah',
        '$namaibu',
        '$tahunibu',
        '$pendidikanibu',
        '$pekerjaanibu',
        '$penghasilanibu',
        '$kebutuhankhususibu'
    );";
    mysqli_query($koneksi, $sql);
    // menampilkan pesan jika data berhasdiinputkan
    echo "<script type='text/javascript'> alert('Pendaftaran siswa Berhasil')</script>";
    header("location:formpendaftaran.php");
    }else{
        //menampilkan pesan jika gagal di inputkan
        echo "<script type='text/javascript'> alert('Pendaftaran siswa gagal')</script>";
    }
}

//fungsction cek inputan
function cek_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
 <div class="container">
       <div class="row">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <!-- ayah kandung -->
          <h4 class="alert alert-primary  mt-3">Data Ayah Kandung</h4>
                <div class="ayah">
                    <!-- nama ayah kandung  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="namaayah" class="col-form-label"> Nama Ayah Kandung </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="namaayah" id="namaayah" class="form-control <?php echo ($errornamaayah !="" ? "is-invalid" : "");?>" 
                        maxlength="40" value="<?php echo $namaayah; ?>" placeholder="Masukan Nama Ayah Anda">
                        <span class="warning"><?php echo $errornamaayah; ?></span>
                        </div>
                    </div><br>
                    <!-- tahun lahir ayah  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="tahunayah" class="col-form-label"> Tahun Lahir </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="tahunayah" id="tahunayah" class="form-control <?php echo ($errortahunayah !="" ? "is-invalid" : "");?>" 
                        maxlength="4" value="<?php echo $tahunayah; ?>" placeholder="Masukan Tahun Lahir Ayah Anda">
                        <span class="warning"><?php echo $errortahunayah; ?></span>
                        </div>
                    </div><br>
                    <!-- riwyat pendidikan -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="rwytpendidikanayah" class="col-form-label"> Riwayat Pendikan </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="rwytpendidkanayah">
                                    <option>Silahkan Pilih</option>
                                    <option value="Tidak Sekolah"  <?php if (isset($pendidikanayah) && $pendidikanayah == "Tidak Sekolah") echo "selected";?>>Tidak Sekolah</option>
                                    <option value="Putus Sekolah" <?php if (isset($pendidikanayah) && $pendidikanayah == "Putus Sekolah") echo "selected";?>>Putus Sekolah</option>
                                    <option value="SD Sederajat" <?php if (isset($pendidikanayah) && $pendidikanayah == "SD Sederajat") echo "selected";?>>SD Sederajat</option>
                                    <option value="SMP Sederajat" <?php if (isset($pendidikanayah) && $pendidikanayah == "SMP Sederajat") echo "selected";?>>SMP Sederajat</option>
                                    <option value="SMA Sederajat" <?php if (isset($pendidikanayah) && $pendidikanayah == "SMA Sederajat") echo "selected";?>>SMA Sederajat</option>
                                    <option value="D1" <?php if (isset($pendidikanayah) && $pendidikanayah == "D1") echo "selected";?>>D1</option>             
                                    <option value="D2" <?php if (isset($pendidikanayah) && $pendidikanayah == "D2") echo "selected";?>>D2</option>
                                    <option value="D3"<?php if (isset($pendidikanayah) && $pendidikanayah == "D3") echo "selected";?>>D3</option>
                                    <option value="D4/S1" <?php if (isset($pendidikanayah) && $pendidikanayah == "D4/S1") echo "selected";?>>D4/S1</option>
                                    <option value="S2" <?php if (isset($pendidikanayah) && $pendidikanayah == "S2") echo "selected";?>>S2</option>
                                    <option value="S3" <?php if (isset($pendidikanayah) && $pendidikanayah == "S3") echo "selected";?>>S3</option> 
                            </select>
                            <span class="warning"><?php echo $errorpendidikanayah; ?></span>
                        </div>
                    </div><br>
                    <!-- pekerjaan ayah  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="pekerjaaanayah" class="col-form-label"> Pekerjaan ayah </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="pekerjaanayah">
                                    <option>Silahkan Pilih</option>
                                    <option value="Tidak Bekerja" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Tidak Bekerja") echo "selected";?>>Tidak Bekerja</option>
                                    <option value="Nelayan" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Nelayan") echo "selected";?>>Nelayan</option>
                                    <option value="Petani" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Petani") echo "selected";?>>Petani</option>
                                    <option value="Peternak" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Peternak") echo "selected";?>>Peternak</option>
                                    <option value="PNS/TNI/Porli" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "PNS/TNI/Porli") echo "selected";?>>PNS/TNI/Porli</option>
                                    <option value="Karyawan Swasta" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Karyawan Swasta") echo "selected";?>>Karyawan Swasta</option>             
                                    <option value="Pedagang Kecil" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Pedagang Kecil") echo "selected";?>>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Pedagang Besar") echo "selected";?>>Pedagang Besar</option>
                                    <option value="Wiraswasta"<?php if (isset($pekerjaanayah) && $pekerjaanayah == "Wiraswasta") echo "selected";?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Wirausaha") echo "selected";?>>Wirausaha</option>
                                    <option value="Pensiunan" <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Pensiunan") echo "selected";?>>Pensiunan</option>
                                    <option value="Lainnya"  <?php if (isset($pekerjaanayah) && $pekerjaanayah == "Lainnya") echo "selected";?>>Lainnya</option>
                            </select>
                            <span class="warning"><?php echo $errorpekerjaanayah; ?></span>
                        </div>
                    </div><br>
                    <!-- penghasilan bulanan  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="penghasilanayah" class="col-form-label"> Penghasilan ayah </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="penghasilanayah">
                                    <option>Silahkan Pilih</option>
                                    <option value="kurang dari 500.000" <?php if (isset($penghasilanayah) && $penghasilanayah == "kurang dari 500.000") echo "selected";?>>kurang dari 500.000</option>
                                    <option value="500.000 - 999.999" <?php if (isset($penghasilanayah) && $penghasilanayah == "500.000 - 999.999") echo "selected";?>>500.000 - 999.999</option>
                                    <option value="1 juta - 1.999.999" <?php if (isset($penghasilanayah) && $penghasilanayah == "1 juta - 1.999.999") echo "selected";?>>1 juta - 1.999.999</option>
                                    <option value="2 juta - 4.999.999" <?php if (isset($penghasilanayah) && $penghasilanayah == "2 juta - 4.999.999") echo "selected";?>>2 juta - 4.999.999</option>
                                    <option value="5 juta - 20 juta" <?php if (isset($penghasilanayah) && $penghasilanayah == "5 juta - 20 juta") echo "selected";?>>5 juta - 20 juta</option>
                                    <option value="Lebih dari 20 juta" <?php if (isset($penghasilanayah) && $penghasilanayah == "Lebih dari 20 juta") echo "selected";?>>Lebih dari 20 juta</option>             
                            </select>
                            <span class="warning"><?php echo $errorpenghasilanayah; ?></span>

                        </div>
                    </div><br>
                    <!-- kebutuhan khusus  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="kebutuhankhususayah" class="col-form-label"> Berkebutuhan Khusus </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="kebutuhankhususayah">
                                <option >Silahkan Pilih</option>
                                <option value="Tidak" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Tidak") echo "selected";?>>Tidak</option>
                                <option value="Netra" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Netra") echo "selected";?>>Netra</option>
                                <option value="Rungu" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Rungu") echo "selected";?>>Rungu</option>
                                <option value="Grahita ringan" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Grahita ringan") echo "selected";?>>Grahita ringan</option>
                                <option value="Grahita sedang" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Grahita sedang") echo "selected";?>>Grahita sedang</option>
                                <option value="Daksa ringan" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Daksa ringan") echo "selected";?>>Daksa ringan</option>
                                <option value="Daksa sedang" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Daksa sedang") echo "selected";?>>Daksa sedang</option>
                                <option value="Laras" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Laras") echo "selected";?>>Laras</option>
                                <option value="Wicara" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Wicara") echo "selected";?>>Wicara</option>
                                <option value="Tuna ganda" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Tuna ganda") echo "selected";?>>Tuna ganda</option>
                                <option value="Hiperaktif" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Hiperaktif") echo "selected";?>>Hiperaktif</option>
                                <option value="Cerdas Istimewa" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Cerdas Istimewa") echo "selected";?>>Cerdas Istimewa</option>
                                <option value="Bakat Istimewa" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Bakat Istimewa") echo "selected";?>>Bakat Istimewa</option>
                                <option value="Kesulitan Belajar" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Kesulitan Belajar") echo "selected";?>>Kesulitan Belajar</option>
                                <option value="Narkoba" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Narkoba") echo "selected";?>>Narkoba</option>
                                <option value="Indigo" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Indigo") echo "selected";?>>Indigo</option>
                                <option value="Down Sindrome" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Down Sindrome") echo "selected";?>>Down Sindrome</option>
                                <option value="Autis" <?php if (isset($kebutuhankhususayah) && $kebutuhankhususayah == "Autis") echo "selected";?>>Autis</option>                      
                            </select>
                            <span class="warning"><?php echo $errorkebutuhankhususayah; ?></span>
                        </div>

                    </div><br>
                 </div>
                <!-- ibu kandung  -->
                <h4 class="alert alert-primary  mt-3">Data Ibu Kandung</h4>
                <div id="ibu">
                    <!-- nama ibu kandung  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="namaibu" class="col-form-label"> Nama Ibu Kandung </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="namaibu" id="namaibu" class="form-control <?php echo ($errornamaayah !="" ? "is-invalid" : "");?>" 
                        maxlength="40" value="<?php echo $namaibu; ?>" placeholder="Masukan Nama Ibu Anda">
                        <span class="warning"><?php echo $errornamaibu; ?></span>
                        </div>
                    </div><br>
                    <!-- tahun lahir ibu  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="tahunibu" class="col-form-label"> Tahun Lahir </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="tahunibu" id="tahunibu" class="form-control <?php echo ($errortahunibu !="" ? "is-invalid" : "");?>" 
                        maxlength="4" value="<?php echo $tahunibu; ?>" placeholder="Masukan Tahun Lahir Ibu Anda">
                        <span class="warning"><?php echo $errortahunibu; ?></span>
                        </div>
                    </div><br>
                    <!-- Riwayat pendidkan ibu  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="rwytpendidikanibu" class="col-form-label"> Riwayat Pendikan </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="rwytpendidkanibu">
                                    <option>Silahkan Pilih</option>
                                    <option value="Tidak Sekolah"  <?php if (isset($pendidikanibu) && $pendidikanibu == "Tidak Sekolah") echo "selected";?>>Tidak Sekolah</option>
                                    <option value="Putus Sekolah" <?php if (isset($pendidikanibu) && $pendidikanibu == "Putus Sekolah") echo "selected";?>>Putus Sekolah</option>
                                    <option value="SD Sederajat" <?php if (isset($pendidikanibu) && $pendidikanibu == "SD Sederajat") echo "selected";?>>SD Sederajat</option>
                                    <option value="SMP Sederajat" <?php if (isset($pendidikanibu) && $pendidikanibu == "SMP Sederajat") echo "selected";?>>SMP Sederajat</option>
                                    <option value="SMA Sederajat" <?php if (isset($pendidikanibu) && $pendidikanibu == "SMA Sederajat") echo "selected";?>>SMA Sederajat</option>
                                    <option value="D1" <?php if (isset($pendidikanibu) && $pendidikanibu == "D1") echo "selected";?>>D1</option>             
                                    <option value="D2" <?php if (isset($pendidikanibu) && $pendidikanibu == "D2") echo "selected";?>>D2</option>
                                    <option value="D3"<?php if (isset($pendidikanibu) && $pendidikanibu == "D3") echo "selected";?>>D3</option>
                                    <option value="D4/S1" <?php if (isset($pendidikanibu) && $pendidikanibu == "D4/S1") echo "selected";?>>D4/S1</option>
                                    <option value="S2" <?php if (isset($pendidikanibu) && $pendidikanibu == "S2") echo "selected";?>>S2</option>
                                    <option value="S3" <?php if (isset($pendidikanibu) && $pendidikanibu == "S3") echo "selected";?>>S3</option> 
                            </select>
                            <span class="warning"><?php echo $errorpendidikanibu; ?></span>
                        </div>
                    </div><br>
                    <!-- pekerjaan ibu  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="penghasilanibu" class="col-form-label"> Pekerjaan ibu </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="pekerjaanibu">
                                    <option>Silahkan Pilih</option>
                                    <option value="Tidak Bekerja" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Tidak Bekerja") echo "selected";?>>Tidak Bekerja</option>
                                    <option value="Nelayan" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Nelayan") echo "selected";?>>Nelayan</option>
                                    <option value="Petani" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Petani") echo "selected";?>>Petani</option>
                                    <option value="Peternak" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Peternak") echo "selected";?>>Peternak</option>
                                    <option value="PNS/TNI/Porli" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "PNS/TNI/Porli") echo "selected";?>>PNS/TNI/Porli</option>
                                    <option value="Karyawan Swasta" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Karyawan Swasta") echo "selected";?>>Karyawan Swasta</option>             
                                    <option value="Pedagang Kecil" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Pedagang Kecil") echo "selected";?>>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Pedagang Besar") echo "selected";?>>Pedagang Besar</option>
                                    <option value="Wiraswasta"<?php if (isset($pekerjaanibu) && $pekerjaanibu == "Wiraswasta") echo "selected";?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Wirausaha") echo "selected";?>>Wirausaha</option>
                                    <option value="Pensiunan" <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Pensiunan") echo "selected";?>>Pensiunan</option>
                                    <option value="Lainnya"  <?php if (isset($pekerjaanibu) && $pekerjaanibu == "Lainnya") echo "selected";?>>Lainnya</option>
                            </select>
                            <span class="warning"><?php echo $errorpekerjaanibu; ?></span>
                        </div>
                    </div><br>
                    <!-- penghasilan ibu  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="penghasilibu" class="col-form-label"> Penghasilan ibu </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="penghasilanibu">
                                    <option >Silahkan Pilih</option>
                                    <option value="kurang dari 500.000" <?php if (isset($penghasilanibu) && $penghasilanibu == "kurang dari 500.000") echo "selected";?>>kurang dari 500.000</option>
                                    <option value="500.000 - 999.999" <?php if (isset($penghasilanibu) && $penghasilanibu == "500.000 - 999.999") echo "selected";?>>500.000 - 999.999</option>
                                    <option value="1 juta - 1.999.999" <?php if (isset($penghasilanibu) && $penghasilanibu == "1 juta - 1.999.999") echo "selected";?>>1 juta - 1.999.999</option>
                                    <option value="2 juta - 4.999.999" <?php if (isset($penghasilanibu) && $penghasilanibu == "2 juta - 4.999.999") echo "selected";?>>2 juta - 4.999.999</option>
                                    <option value="5 juta - 20 juta" <?php if (isset($penghasilanibu) && $penghasilanibu == "5 juta - 20 juta") echo "selected";?>>5 juta - 20 juta</option>
                                    <option value="Lebih dari 20 juta" <?php if (isset($penghasilanibu) && $penghasilanibu == "Lebih dari 20 juta") echo "selected";?>>Lebih dari 20 juta</option>            
                            </select>
                            <span class="warning"><?php echo $errorpenghasilanibu; ?></span>
                        </div>
                    </div><br>

                    <!-- kebutuhan khusus  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="kebutuhankhususibu" class="col-form-label"> Berkebutuhan Khusus </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="kebutuhankhususibu">
                                <option >Silahkan Pilih</option>
                                <option value="Tidak" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Tidak") echo "selected";?>>Tidak</option>
                                <option value="Netra" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Netra") echo "selected";?>>Netra</option>
                                <option value="Rungu" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Rungu") echo "selected";?>>Rungu</option>
                                <option value="Grahita ringan" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Grahita ringan") echo "selected";?>>Grahita ringan</option>
                                <option value="Grahita sedang" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Grahita sedang") echo "selected";?>>Grahita sedang</option>
                                <option value="Daksa ringan" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Daksa ringan") echo "selected";?>>Daksa ringan</option>
                                <option value="Daksa sedang" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Daksa sedang") echo "selected";?>>Daksa sedang</option>
                                <option value="Laras" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Laras") echo "selected";?>>Laras</option>
                                <option value="Wicara" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Wicara") echo "selected";?>>Wicara</option>
                                <option value="Tuna ganda" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Tuna ganda") echo "selected";?>>Tuna ganda</option>
                                <option value="Hiperaktif" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Hiperaktif") echo "selected";?>>Hiperaktif</option>
                                <option value="Cerdas Istimewa" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Cerdas Istimewa") echo "selected";?>>Cerdas Istimewa</option>
                                <option value="Bakat Istimewa" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Bakat Istimewa") echo "selected";?>>Bakat Istimewa</option>
                                <option value="Kesulitan Belajar" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Kesulitan Belajar") echo "selected";?>>Kesulitan Belajar</option>
                                <option value="Narkoba" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Narkoba") echo "selected";?>>Narkoba</option>
                                <option value="Indigo" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Indigo") echo "selected";?>>Indigo</option>
                                <option value="Down Sindrome" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Down Sindrome") echo "selected";?>>Down Sindrome</option>
                                <option value="Autis" <?php if (isset($kebutuhankhususibu) && $kebutuhankhususibu == "Autis") echo "selected";?>>Autis</option>                      
                            </select>
                            <span class="warning"><?php echo $errorkebutuhankhususibu; ?></span>
                        </div>

                    </div><br>
                 </div>
<!-- button submit  -->
<div class="form-group row ">
                <button class="btn btn-primary" type="submit">Submit</button>
                </div>                 
            </form>
       </div>
   </div>
<!-- import js bootsrap via cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
