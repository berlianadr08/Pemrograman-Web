<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>

    <!-- import bootsrap css via cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .warning {color:#FF0000;}
    </style>
</head>
<body>

<?php
// varibel isi inputan 
{
    $nama="";
    $jeniskelamin="";
    $nisn="";
    $nik="";
    $tempatlahir="";
    $tanggallahir="";
    $agama="";
    $berkebutuhankhususpribadi="";
    $alamat="";
    $rt="";
    $rw="";
    $dusun="";
    $desa="";
    $kecamatan="";
    $pos="";
    $tempattingal="";
    $transportasi="";
    $nohp="";
    $notlp="";
    $mail="";
    $penerimapkh="";
    $nomorpkh="";
    $kewarganegaraan="";
    $namanegara="";
}
// variabel eror 
{
    $errornama="";
    $errorjeniskelamin="";
    $errornisn="";
    $errornik="";
    $errortempatlahir="";
    $errortanggallahir="";
    $erroragama="";
    $errorberkebutuhankhususpribadi="";
    $erroralamat="";
    $errorrt="";
    $errorrw="";
    $errordusun="";
    $errordesa="";
    $errorkecamatan="";
    $errorpos="";
    $errortempattingal="";
    $errortransportasi="";
    $errornohp="";
    $errornotlp="";
    $errormail="";
    $errorpenerimapkh="";
    $errornomorpkh="";
    $errorkewarganegaraan="";
    $errornamanegara="";
}

// validasi isi form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
       //nama
       {
        if (empty($_POST["nama"])) {
            /*Variabel error nama dibuat dan disimpan sesuai format*/
            $errornama = "Nama tidak boleh kosong";
        }
        else {
            /*cek_input(nama) untuk menghapus kesalahan spasial maupun lainnya pada field dan disimpan dalam variabel $nama*/
            $nama = cek_input($_POST["nama"]);
            /*cek apakah format nama sudah sesuai hanya huruf dan spasi*/
            if (!preg_match("/^[a-zA-Z ]*$/", $nama)) 
            {
                /*variabel error nama disimpan*/
                $errornama = "Inputan hanya boleh huruf dan spasi";
               
            }else{
                $errornama="";
            }
        }
    }
    //kelamin
    {
        if(empty($_POST["jeniskelamin"])){
            $errorjeniskelamin = "jenis Kelamin harus di pilih";
        }else{
            $jeniskelamin=cek_input($_POST["jeniskelamin"]);
            $errorjeniskelamin="";
        }
    }
    //nisn
    {
        if(empty($_POST["nonisn"])){
            $errornisn="NISN tidak boleh kosong";
        }
        else{
            $nisn=cek_input($_POST["nonisn"]);
            if(!is_numeric($nisn)){
                $errornisn="NISN hanya boleh berisi angka";
               
            }
            else{
                $errornisn="";
            }
        }
    }
    //nik
    {
        if(empty($_POST["nonik"])){
            $errornik="NIK tidak boleh kosong";
        }
        else{
            $nik=cek_input($_POST["nonik"]);
            if(!is_numeric($nik)){
                $errornik="NIK hanya boleh berisi angka";
                
            }else{
                $errornik="";
            }
        }
    }
    //tempatlahir
    {
        if (empty($_POST["tempatLahir"])) {
            /*Variabel error nama dibuat dan disimpan sesuai format*/
            $errortempatlahir = "Tempat lahir tidak boleh kosong";
        }
        else {
            /*cek_input(nama) untuk menghapus kesalahan spasial maupun lainnya pada field dan disimpan dalam variabel $nama*/
            $tempatlahir = cek_input($_POST["tempatLahir"]);

            /*cek apakah format nama sudah sesuai hanya huruf dan spasi*/
            if (!preg_match("/^[a-zA-Z ]*$/", $tempatlahir)) 
            {
                /*variabel error nama disimpan*/
                $errortempatlahir= "Inputan hanya boleh huruf dan spasi";
            }else{
                $errortempatlahir="";
            }
        }
    }
    //tanggal lahir
    {
        if(empty($_POST["tgllhr"])){
            $errortanggallahir = "Tanggal lahir harus diisi";
        }else{
            $tanggallahir=cek_input($_POST["tgllhr"]);
            $tanggallahir=date('Y-m-d', strtotime($tanggallahir));
            $errortanggallahir ="";
        }
    }
    //agama
    {
        if (!isset($_POST["agama"])) {
            $erroragama = "agama harus dipilih";
        }
        else
        {
            $agama = cek_input($_POST["agama"]);
            if($agama=="Silahkan Pilih"){
                $erroragama = "Agama harus dipilih";
            }else{
                $erroragama="";
            }
            
        }
    }
    //berkebutuhan khusus
    {
        if (!isset($_POST["kebutuhankhusus"])) {
            $errorberkebutuhankhususpribadi = "Berkebutuhan harus dipilih";
        }
        else
        {
            $berkebutuhankhususpribadi = cek_input($_POST["kebutuhankhusus"]);
            if($berkebutuhankhususpribadi=="Silahkan Pilih"){
                $errorberkebutuhankhususpribadi = "Berkebutuhan khusus harus dipilih";
            }
            else{
                $errorberkebutuhankhususpribadi="";
            }
        }
    }
    //alamat
    {
        if (empty($_POST["alamat"])) {
            $erroralamat = "alamat tidak boleh kosong";
        }
        else {
            $alamat = cek_input($_POST["alamat"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $alamat)) 
            {
              
                $erroralamat = "Inputan hanya boleh huruf dan spasi";
            }else{
                $erroralamat="";
            }
        }
    }
    //rt
    {
        if(empty($_POST["rt"])){
            $errorrt="RT tidak boleh kosong";
        }
        else{
            $rt=cek_input($_POST["rt"]);
            if(!is_numeric($rt)){
                $errorrt="RT hanya boleh berisi angka";
            }else{
                $errorrt="";
            }
        }
    }
    //rw
    {
        if(empty($_POST["rw"])){
            $errorrw="RW tidak boleh kosong";
        }
        else{
            $rw=cek_input($_POST["rw"]);
            if(!is_numeric($rw)){
                $errorrw="RW hanya boleh berisi angka";
            }else{
                $errorrw="";
            }
        }
    }
    //pos
    {
        if(empty($_POST["pos"])){
            $errorpos="pos tidak boleh kosong";
        }
        else{
            $pos=cek_input($_POST["pos"]);
            if(!is_numeric($pos)){
                $errorpos="pos hanya boleh berisi angka";
            }else{
                $errorpos="";
            }
        }
    }
    //hp
    {
        if(empty($_POST["hp"])){
            $errornohp="Nomor HP tidak boleh kosong";
        }
        else{
            $nohp=cek_input($_POST["hp"]);
            if(!is_numeric($nohp)){
                $errornohp="Nomor HP hanya boleh berisi angka";
            }else{
                $errornohp="";
            }
        }
    }
    //telephone
    {
        if(empty($_POST["tlp"])){
            $errornotlp="Telephone tidak boleh kosong";
        }
        else{
            $notlp=cek_input($_POST["tlp"]);
            if(!is_numeric($notlp)){
                $errornotlp="Nomor Telephone hanya boleh berisi angka";
            }else{
                $errornotlp="";
            }
        }
    }
    //kip
    {
        if(empty($_POST["nokip"])){
            $errornomorpkh="tidak boleh kosong";
        }
        else{
            $nomorpkh=cek_input($_POST["nokip"]);
            if(!is_numeric($nomorpkh)){
                $errornomorpkh="hanya boleh berisi angka";
            }else{
                $errornomorpkh="";
            }
        }
    }
    //dusun
    {
        if (empty($_POST["dusun"])) {
            $errordusun = "Dusun tidak boleh kosong";
        }
        else {
            $dusun = cek_input($_POST["dusun"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $dusun)) 
            {
              
                $errordusun = "Inputan hanya boleh huruf dan spasi";
            }else{
                $errordusun="";
            }
        }
    }
    //desa
    {
        if (empty($_POST["desa"])) {
            $errordesa = "Desa tidak boleh kosong";
        }
        else {
            $desa = cek_input($_POST["desa"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $desa)) 
            {
              
                $errordesa = "Inputan hanya boleh huruf dan spasi";
            }else{
                $errordesa ="";
            }
        }
    }
    //kecamatan
    {
        if (empty($_POST["kecamatan"])) {
            $errorkecamatan = "Kecamatan tidak boleh kosong";
        }
        else {
            $kecamatan = cek_input($_POST["kecamatan"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $kecamatan)) 
            {
              
                $errorkecamatan = "Inputan hanya boleh huruf dan spasi";
            }else{
                $errorkecamatan="";
            }
        }
    }
    //namanegara
    {
        if (empty($_POST["naneg"])) {
            $errornamanegara = "Nama Negara tidak boleh kosong";
        }
        else {
            $namanegara = cek_input($_POST["naneg"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $namanegara)) 
            {
              
                $errornamanegara = "Inputan hanya boleh huruf dan spasi";
            }else{
                $errornamanegara="";
            }
        }
    }

// pengecekan kondisi apakah ada error dalam pengisian form
if( $errornama==""&&
$errorjeniskelamin==""&&
$errornisn==""&&
$errornik==""&&
$errortempatlahir==""&&
$errortanggallahir==""&&
$erroragama==""&&
$errorberkebutuhankhususpribadi==""&&
$erroralamat==""&&
$errorrt==""&&
$errorrw==""&&
$errordusun==""&&
$errordesa==""&&
$errorkecamatan==""&&
$errorpos==""&&
$errortempattingal==""&&
$errortransportasi==""&&
$errornohp==""&&
$errornotlp==""&&
$errormail==""&&
$errorpenerimapkh==""&&
$errornomorpkh==""&&
$errorkewarganegaraan==""&&
$errornamanegara==""
){

  //proses memasukan data ke database
  include 'koneksi.php';
  $sql=" INSERT INTO biodata (`nik`, `tanggalisiformulir`, `jenispendaftaran`, `tanggalmasuk`, `nis`, `nomorpendaftaran`, `paud`, `tk`, `skhun`, `ijazah`, `cita`, `hobi`, `nama`, `kelamin`, `nisn`, `tempatlahir`, `tanggallahir`, `agama`, `kebutuhankhusus`, `alamat`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `pos`, `tempattinggal`, `transportasi`, `nohp`, `notlp`, `mail`, `penerimapkh`, `nomorpkh`, `kewarganegaraan`, `negara`, `ayah`, `tahunayah`, `pendidikanayah`, `pekerjaanayah`, `penghasilanayah`, `kebutuhankhususayah`, `ibu`, `tahunibu`, `pendidikanibu`, `pekerjaanibu`, `penghasilanibu`, `kebutuhankhususibu`) VALUES ('$nik', 
  '$nama',
  '$jeniskelamin',
  '$nisn',
  '$tempatlahir',
  '$tanggallahir',
  '$agama',
  '$berkebutuhankhususpribadi',
  '$alamat',
  '$rt',
  '$rw',
  '$dusun',
  '$desa',
  '$kecamatan',
  '$pos',
  '$tempattingal',
  '$transportasi',
  '$nohp',
  '$notlp',
  '$mail',
  '$penerimapkh',
  '$nomorpkh',
  '$kewarganegaraan',
  '$namanegara',
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
        <!-- header Data Pribadi  -->
        <h4 class="alert alert-primary  mt-3">Data Pribadi</h4>
                <div class="datapribadi">
                    <!-- nama lengkap text 40 -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="nama" class="col-form-label "> Nama</label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="nama" id="nama" 
                        class="form-control <?php echo ($errornama !="" ? "is-invalid" : "");?> " 
                        maxlength="40" value="<?php echo $nama; ?>" placeholder="Masukan Nama Lengkap Anda">
                        <span class="warning"><?php echo $errornama; ?></span>
                        </div>
                    </div><br>
                    <!-- jenis kelamin radio  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="jeniskelamin" class="col-form-label"> Jenis Kelamin</label>
                        </div>
                        <div class="col-md-9">
                        <div class="form-check-inline">
                            <input type="radio" name="jeniskelamin" id="jk" class="form-check-input" value="Laki-Laki"
                            <?php if (isset($jeniskelamin) && $jeniskelamin =="Laki-Laki") echo "checked";?>>
                            <label for="JenisKelamin">Laki-Laki</label>
                        </div>
                        <div class="form-check-inline">
                                <input type="radio" name="jenisKelamin" id="jk" class="form-check-input" value="Perempuan"
                                <?php if (isset($jeniskelamin) && $jeniskelamin =="Perempuan") echo "checked";?>>
                                >
                                <label for="JenisKelamin">Perempuan</label>
                            </div>
                            <span class="warning"><?php echo $errorjeniskelamin; ?></span>
                        </div>
                    </div><br>
                    <!-- nisn text 10  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="nisn" class="col-form-label"> NISN</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="nonisn" id="nonisn" class="form-control <?php echo ($nisn !="" ? "is_invalid" : ""); ?>" 
                        maxlength="10" value="<?php echo $nisn; ?>" placeholder="Masukan NISN Anda">
                        <span class="warning"><?php echo $errornisn; ?></span>
                        </div>
                    </div><br>
                    <!-- nik text 18  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="nik" class="col-form-label  "> NIK</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="nonik" id="nonik" class="form-control <?php echo ($nik !="" ? "is_invalid" : ""); ?>" 
                        maxlength="18" value="<?php echo $nik; ?>" placeholder="Masukan NIK Anda">
                        <span class="warning"><?php echo $errornik; ?></span>
                        </div>
                    </div><br>
                    <!-- tempat lahir text 30  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="tempatLahir" class="col-form-label"> Tempat Lahir</label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="tempatLahir" id="tempatLahir" class="form-control  <?php echo ($errortempatlahir !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $tempatlahir; ?>" placeholder="Masukan Tempat Lahir Anda">
                        <span class="warning"><?php echo $errortempatlahir; ?></span>
                        </div>
                    </div><br>
                    <!-- tanggal lahir date  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="tanggallahir" class="col-form-label"> Tanggal Lahir</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="tgllhr" id="tgllhr" 
                            class="form-control <?php echo ($errortanggallahir !="" ? "is_invalid" : ""); ?>" 
                            value="<?php echo $tanggallahir; ?>">
                            <span class="warning"><?php echo $errortanggallahir; ?></span>
                    </div>
                        </div>
                    </div><br>
                    <!-- agama select  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="selectagama" class="col-form-label"> Agama </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="agama">
                                <option >Silahkan Pilih</option>
                                <option value="Islam"  <?php if (isset($agama) && $agama == "Islam") echo "selected";?>>Islam</option>
                                <option value="Kristen" <?php if (isset($agama) && $agama == "Kristen") echo "selected";?>>Kristen</option>
                                <option value="Katholik" <?php if (isset($agama) && $agama == "Katholik") echo "selected";?>>Katholik</option>
                                <option value="Hindu" <?php if (isset($agama) && $agama == "Hindu") echo "selected";?>>Hindu</option>
                                <option value="Budha" <?php if (isset($agama) && $agama == "Budha") echo "selected";?>>Budha</option>
                                <option value="Konghucu" <?php if (isset($agama) && $agama == "Konghucu") echo "selected";?>>Konghucu</option>
                                <option value="Lainya"<?php if (isset($agama) && $agama == "Lainya") echo "selected";?> >Lainya</option>                           
                            </select>
                            <span class="warning"><?php echo $erroragama; ?></span>

                        </div>
                    </div><br>
                    <!-- berkebutuhan khusus select  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="selectkebutuhan" class="col-form-label"> Berkebutuhan Khusus </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="kebutuhankhusus">
                                <option >Silahkan Pilih</option>
                                <option value="Tidak" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Tidak") echo "selected";?>>Tidak</option>
                                <option value="Netra" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Netra") echo "selected";?>>Netra</option>
                                <option value="Rungu" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Rungu") echo "selected";?>>Rungu</option>
                                <option value="Grahita ringan" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Grahita ringan") echo "selected";?>>Grahita ringan</option>
                                <option value="Grahita sedang" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Grahita sedang") echo "selected";?>>Grahita sedang</option>
                                <option value="Daksa ringan" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Daksa ringan") echo "selected";?>>Daksa ringan</option>
                                <option value="Daksa sedang" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Daksa sedang") echo "selected";?>>Daksa sedang</option>
                                <option value="Laras" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Laras") echo "selected";?>>Laras</option>
                                <option value="Wicara" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Wicara") echo "selected";?>>Wicara</option>
                                <option value="Tuna ganda" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Tuna ganda") echo "selected";?>>Tuna ganda</option>
                                <option value="Hiperaktif" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Hiperaktif") echo "selected";?>>Hiperaktif</option>
                                <option value="Cerdas Istimewa" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Cerdas Istimewa") echo "selected";?>>Cerdas Istimewa</option>
                                <option value="Bakat Istimewa" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Bakat Istimewa") echo "selected";?>>Bakat Istimewa</option>
                                <option value="Kesulitan Belajar" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Kesulitan Belajar") echo "selected";?>>Kesulitan Belajar</option>
                                <option value="Narkoba" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Narkoba") echo "selected";?>>Narkoba</option>
                                <option value="Indigo" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Indigo") echo "selected";?>>Indigo</option>
                                <option value="Down Sindrome" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Down Sindrome") echo "selected";?>>Down Sindrome</option>
                                <option value="Autis" <?php if (isset($berkebutuhankhususpribadi) && $berkebutuhankhususpribadi == "Autis") echo "selected";?>>Autis</option>                      
                            </select>
                            <span class="warning"><?php echo $errorberkebutuhankhususpribadi; ?></span>
                            
                        </div>
                    </div><br>
                    <!-- alamat text 40 -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="alamat" class="col-form-label"> Alamat</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="alamat" id="alamat" 
                        class="form-control <?php echo ($erroralamat !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $alamat; ?>" placeholder="Masukan Alamat Anda">
                        <span class="warning"><?php echo $erroralamat; ?></span>
                        </div>
                    </div><br>
                    <!-- rt text 3 -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="rt" class="col-form-label"> RT</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="rt" id="rt" class="form-control <?php echo ($errorrt !="" ? "is-invalid" : "");?>" 
                        maxlength="3" value="<?php echo $rt; ?>" placeholder="Masukan RT Anda example : 008">
                        <span class="warning"><?php echo $errorrt; ?></span>
                        </div>
                    </div><br>
                    <!-- rw text 3  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="rw" class="col-form-label >"> RW </label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="rw" id="rw" class="form-control <?php echo ($errorrw !="" ? "is-invalid" : "");?>" 
                        maxlength="3" value="<?php echo $rw; ?>" placeholder="Masukan RW Anda example : 008">

                        <span class="warning"><?php echo $errorrw; ?></span>
                        </div>
                    </div><br>
                    <!-- dusun text 30  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="dusun" class="col-form-label"> Dusun</label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="dusun" id="dusun" class="form-control <?php echo ($errordusun !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $dusun; ?>" placeholder="Masukan Dusun Anda">

                        <span class="warning"><?php echo $errordusun; ?></span>
                        </div>
                    </div><br>
                    <!-- desa text 30  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="desa" class="col-form-label"> Desa</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="desa" id="desa" class="form-control <?php echo ($errordesa !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $desa; ?>" placeholder="Masukan Desa Anda">

                        <span class="warning"><?php echo $errordesa; ?></span>
                        </div>
                    </div><br>
                    <!-- kecamatan text 30  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="kecamatan" class="col-form-label"> Kecamatan</label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="kecamatan" id="kecamatan" class="form-control <?php echo ($errorkecamatan !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $kecamatan; ?>" placeholder="Masukan kecamatan Anda">
                        <span class="warning"><?php echo $errorkecamatan; ?></span>
                        </div>
                    </div><br>
                    <!-- pos text 5  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="pos" class="col-form-label"> POS</label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="pos" id="pos" class="form-control <?php echo ($errorpos !="" ? "is-invalid" : "");?>" 
                        maxlength="5" value="<?php echo $pos; ?>" placeholder="Masukan Alamat POS Anda">

                        <span class="warning"><?php echo $errorpos; ?></span>
                        </div>
                    </div><br>
                    <!-- tempat tinggal select  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="tempattinggal" class="col-form-label"> Tempat Tinggal </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="tpttinggal">
                                    <option>Silahkan Pilih</option>
                                    <option value="Bersama Orang Tua" <?php if (isset($tempattingal) && $tempattingal == "Bersama Orang Tua") echo "selected";?>>Bersama Orang Tua</option>
                                    <option value="Wali" <?php if (isset($tempattingal) && $tempattingal == "Wali") echo "selected";?>>Wali</option>
                                    <option value="Kos" <?php if (isset($tempattingal) && $tempattingal == "Kos") echo "selected";?>>Kos</option>
                                    <option value="Asrama" <?php if (isset($tempattingal) && $tempattingal == "Asrama") echo "selected";?>>Asrama</option>
                                    <option value="Panti Asuhan"<?php if (isset($tempattingal) && $tempattingal == "Panti Asuhan") echo "selected";?>>Panti Asuhan</option>
                                    <option value="Lainnya" <?php if (isset($tempattingal) && $tempattingal == "Lainya") echo "selected";?>>Lainnya</option>             
                            </select>
                            <span class="warning"><?php echo $errortempattingal; ?></span>
                        </div>
                    </div><br>
                    <!-- moda transportasi select  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="transportasi" class="col-form-label"> Moda Transportasi </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="transportasi">
                                <option>Silahkan Pilih</option>
                                <option value="Jalan Kaki" <?php if (isset($transportasi) && $transportasi == "Jalan Kaki") echo "selected";?>>Jalan Kaki</option>
                                <option value="Kendaraan Pribadi" <?php if (isset($transportasi) && $transportasi == "Kendaraan Pribadi") echo "selected";?>>Kendaraan Pribadi</option>
                                <option value="Kendaraan Umum" <?php if (isset($transportasi) && $transportasi == "Kendaraan Umum") echo "selected";?> >Kendaraan Umum</option>
                                <option value="Jemputan Sekolah" <?php if (isset($transportasi) && $transportasi == "Jemputan Sekolah") echo "selected";?>>Jemputan Sekolah</option>
                                <option value="Kereta Api" <?php if (isset($transportasi) && $transportasi == "Kereta Api") echo "selected";?>>Kereta Api</option>
                                <option value="Ojek" <?php if (isset($transportasi) && $transportasi == "Ojek") echo "selected";?> >Ojek</option>
                                <option value="Andong/Bendi/Sado/Dokar" <?php if (isset($transportasi) && $transportasi == "Andong/Bendi/Sado/Dokar") echo "selected";?>>Andong/Bendi/Sado/Dokar</option>
                                <option value="Perahu Penyebrangan" <?php if (isset($transportasi) && $transportasi == "Perahu Penyebrangan") echo "selected";?>>Perahu Penyebrangan</option>
                                <option value="Lainnya" <?php if (isset($transportasi) && $transportasi == "Lainnya") echo "selected";?>>Lainnya</option>          
                            </select>
                            <span class="warning"><?php echo $errortransportasi; ?></span>
                        </div>
                    </div><br>
                    <!-- nomor hp text-13 -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="hp" class="col-form-label"> Nomor Handphone </label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="hp" id="hp" class="form-control <?php echo ($errornohp !="" ? "is-invalid" : "");?>" 
                        maxlength="13" value="<?php echo $nohp;  ?>" placeholder="081234567891">

                        <span class="warning"><?php echo $errornohp; ?></span>
                        </div>
                    </div><br>
                    <!-- nomor telephone  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="tlp" class="col-form-label"> Nomor telephone </label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="tlp" id="tlp" class="form-control <?php echo ($errornotlp !="" ? "is-invalid" : "");?>" 
                        maxlength="13" value="<?php echo $notlp;  ?>" placeholder="081234567891">

                        <span class="warning"><?php echo $errornotlp; ?></span>
                        </div>
                    </div><br>
                    <!-- email text30  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="mail" class="col-form-label"> Email Pribadi </label>
                        </div>
                        <div class="col-md-9">

                        <input type="text" name="mail" id="mail" class="form-control <?php echo ($errormail !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $mail;  ?>" placeholder="nimadeberliana812@gmail.com">

                        <span class="warning"><?php echo $errormail;  ?></span>
                        </div>
                    </div><br>
                    <!-- kip radio -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="kip" class="col-form-label"> Penerima PKH/KIS/KIP</label>
                        </div>
                        <div class="col-md-9">
                        <div class="form-check-inline">
                            <input type="radio" name="kip" id="kip" class="form-check-input" value="Ya"
                            <?php if (isset($penerimapkh) && $penerimapkh =="Ya") echo "checked";?>>
                            <label for="kip">Ya</label>
                        </div>
                        <div class="form-check-inline">
                                <input type="radio" name="kip" id="kip" class="form-check-input" value="Tidak"
                                <?php if (isset($penerimapkh) && $penerimapkh =="Tidak") echo "checked";?>>
                                <label for="kip">Tidak</label>
                            </div>
                            <span class="warning"><?php echo $errorpenerimapkh; ?></span>
                        </div>
                    </div><br>
                    <!-- nomor kip text 20  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="nokip" class="col-form-label"> Nomor PKH/KIS/KIP </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="nokip" id="nokip" class="form-control  <?php echo ($errornomorpkh !="" ? "is-invalid" : "");?>" 
                        maxlength="20" value="<?php echo $nomorpkh;  ?>" placeholder="Masukkan Nomor PKH/KIS/KIP">
                        <div id="nokiphelp" class="form-text">Jika tidak mempunyai diisi 0
                            </div>
                        <span class="warning"><?php echo $errornomorpkh; ?></span>
                        </div>
                    </div><br>
                    <!-- kewargeanegaraan radio  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="wn" class="col-form-label"> Kewarganegaraan </label>
                        </div>
                        <div class="col-md-9">
                        <div class="form-check-inline">
                            <input type="radio" name="wn" id="wn" class="form-check-input" value="WNI"
                            <?php if (isset($kewarganegaraan) && $kewarganegaraan =="WNI") echo "checked";?>>
                            <label for="wn">Warga Negara Indonesia (WNI)</label>
                        </div>
                        <div class="form-check-inline">
                                <input type="radio" name="wn" id="wn" class="form-check-input" value="WNA"
                                <?php if (isset($kewarganegaraan) && $kewarganegaraan =="WNA") echo "checked";?>>
                                <label for="wn">Warga Negara Asing (WNA)</label>
                            </div>
                            <span class="warning"><?php echo $errorkewarganegaraan;?></span>
                           
                        </div>
                    </div><br>
                    <!-- nama negara text-30  -->
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="naneg" class="col-form-label"> Nama Negara </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="naneg" id="naneg" class="form-control <?php echo ($errornamanegara !="" ? "is-invalid" : "");?>" 
                        maxlength="30" value="<?php echo $namanegara; ?>" placeholder="Nama Negara Anda">
                        <span class="warning"><?php echo $errornamanegara; ?></span>
                        </div>
                    </div><br>
                 </div>
  <!-- button submit  -->
  <div class="form-group row ">
                <a href="dataortukandung.php" type="submit" class="btn btn-primary">
                    Next
                    </a>
                </div>                 
            </form>
       </div>
   </div>
<!-- import js bootsrap via cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>