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
    $tanngalisiformulir="";
    $jenisPendaftaran="";
    $tanggalmasuk="";
    $nis="";
    $nopu="";
    $pernahpaud="";
    $pernahtk="";
    $skhun="";
    $ijazah="";
    $cita="";
    $hobi="";
}
// variabel eror 
{
    $errortanngalisiformulir="";
    $errorjensiPendaftaran="";
    $errortanggalmasuk="";
    $errornis="";
    $errornopu="";
    $errorpernahtk="";
    $errorpernahpaud="";
    $errorskhun="";
    $errorijazah="";
    $errorcita="";
    $errorhobi="";
}

// validasi isi form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // cek tanggal daftar 
    {
        if(empty($_POST["tgldftr"])){
            $errortanngalisiformulir = "Tanggal isi formulir harus diisi";
        }else{
            $tanngalisiformulir=cek_input($_POST["tgldftr"]);
            $tanngalisiformulir=date('Y-m-d', strtotime($tanngalisiformulir));
            $errortanngalisiformulir="";
        }
        
    }
    //cek jenis pendaftaran
    {
        if(empty($_POST["jenispendaftaran"])){
            $errorjensiPendaftaran = "jenis pendaftaran harus di pilih";
        }else{
            $jenisPendaftaran=cek_input($_POST["jenispendaftaran"]);
            $errorjensiPendaftaran="";
        }
    }   
    //tanggal masuk
    {
        if(empty($_POST["tglmsk"])){
            $errortanggalmasuk = "Tanggal masuk formulir harus diisi";
        }else{
            $tanggalmasuk=cek_input($_POST["tglmsk"]);
            $tanggalmasuk=date('Y-m-d', strtotime($tanggalmasuk));
            $errortanggalmasuk="";
        
        }
    }
    //nis
    {
        if(empty($_POST["nonis"])){
            $errornis="NIS tidak boleh kosong";
        }
        else{
            $nis=cek_input($_POST["nonis"]);
            if(!is_numeric($nis)){
                $errornis="NIS hanya boleh berisi angka";
               
            }else{
                $errornis="";
            }
        }
    }
    //nomor pendaftaran
    {
        if(empty($_POST["nopu"])){
            $errornopu="Nomor peserta ujian tidak boleh kosong";
        }
        else{
            $nopu=cek_input($_POST["nopu"]);
            if(!is_numeric($nopu)){
                $errornopu="Nomor peserta ujian hanya boleh berisi angka";
                
            }else{
                $errornopu="";
            }
        }
    }
    //pernah paud
    {
        if(empty($_POST["pernahpaud"])){
            $errorpernahpaud = "pilihan harus di pilih";
        }else{
            $pernahpaud =cek_input($_POST["pernahpaud"]);
            $errorpernahpaud="";
        }
    }
    //pernahtk
    {
        if(empty($_POST["pernahtk"])){
            $errorpernahtk = "pilihan harus di pilih";
        }else{
            $pernahtk =cek_input($_POST["pernahtk"]);
            $errorpernahtk="";
        }
    }
    //error skhun
    {
        if(empty($_POST["noSKHUN"])){
            $errorskhun="Nomor SKHUN tidak boleh kosong";
        }
        else{
            $skhun=cek_input($_POST["noSKHUN"]);
            if(!is_numeric($skhun)){
                $errorskhun="Nomor SKHUN hanya boleh berisi angka";
               
            }else{
                $errorskhun="";
            }
        }
    }
    //ijazah
    {
        if(empty($_POST["noijzh"])){
            $errorijazah="Nomor Ijazah tidak boleh kosong";
        }
        else{
            $ijazah=cek_input($_POST["noijzh"]);
            if(!is_numeric($ijazah)){
                $errorijazah="Nomor Ijazah hanya boleh berisi angka";
              
            }else{
                $errorijazah="";
            }
        }
    }
    //hobi
    {
        if (!isset($_POST["hobi"])) {
            $errorhobi = "Hobi harus dipilih";
        }
        else
        {
            $hobi = cek_input($_POST["hobi"]);
            if($hobi=="Silahkan Pilih"){
                $errorhobi = "Hobi harus dipilih";
               
            }else{
                $errorhobi="";
            }
        }
    }
    //cita
    {
        if (!isset($_POST["cita"])) {
            $errorcita = "cita harus dipilih";
        }
        else
        {
            $cita = cek_input($_POST["cita"]);
            if($cita=="Silahkan Pilih"){
                $errorcita = "Cita harus dipilih";
               
            }else{
                $errorcita="";
            }
        }
    }
      // pengecekan kondisi apakah ada error dalam pengisian form
      if($errortanngalisiformulir==""&&
      $errorjensiPendaftaran==""&&
      $errortanggalmasuk==""&&
      $errornis==""&&
      $errornopu==""&&
      $errorpernahtk==""&&
      $errorpernahpaud==""&&
      $errorskhun==""&&
      $errorijazah==""&&
      $errorcita==""&&
      $errorhobi==""
      ){

         //proses memasukan data ke database
         include 'koneksi.php';
         $sql=" INSERT INTO biodata (`nik`, `tanggalisiformulir`, `jenispendaftaran`, `tanggalmasuk`, `nis`, `nomorpendaftaran`, `paud`, `tk`, `skhun`, `ijazah`, `cita`, `hobi`, `nama`, `kelamin`, `nisn`, `tempatlahir`, `tanggallahir`, `agama`, `kebutuhankhusus`, `alamat`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `pos`, `tempattinggal`, `transportasi`, `nohp`, `notlp`, `mail`, `penerimapkh`, `nomorpkh`, `kewarganegaraan`, `negara`, `ayah`, `tahunayah`, `pendidikanayah`, `pekerjaanayah`, `penghasilanayah`, `kebutuhankhususayah`, `ibu`, `tahunibu`, `pendidikanibu`, `pekerjaanibu`, `penghasilanibu`, `kebutuhankhususibu`) VALUES ('$nik', 
         '$tanngalisiformulir',     
         '$jenisPendaftaran',
         '$tanggalmasuk',
         '$nis',
         '$nopu',
         '$pernahpaud',
         '$pernahtk',
         '$skhun',
         '$ijazah',
         '$cita',
         '$hobi'
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
                <!-- header pendaftaran  -->
                <h2 class="alert alert-primary text-center mt-3">Formulir Pendaftaran Peserta Didik</h2>
                <!-- input tanggal pendaftaran  -->
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="tanggalpengisian" class="col-form-label"> Tanggal Pengisian</label>
                    </div>
                    <div class="col-md-9">
                                <input type="date" name="tgldftr" id="tgldftr" 
                                class="form-control <?php echo ($errortanngalisiformulir !="" ? "is_invalid" : ""); ?>" 
                                value="<?php echo $tanngalisiformulir; ?>">
                                <span class="warning"><?php echo $errortanngalisiformulir; ?></span>
                    </div>
                    
                </div>
                    <!-- header sub registrasi data peserta  -->
                    <h4 class="alert alert-primary  mt-3">Registrasi Peserta didik</h4>
                    <div class="datapeserta">
                        <!-- jenis pendaftaran radio  -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="jenispendaftaran" class="col-form-label"> Jenis Pendaftaran</label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-check-inline">
                                    <input type="radio" name="jenispendaftaran" id="jp" class="form-check-input" value="Siswa Baru"
                                    <?php if (isset($jenisPendaftaran) && $jenisPendaftaran =="Siswa Baru") echo "checked";?>
                                    >
                                    <label for="Siswa Baru">Siswa Baru</label>
                                </div>
                                <div class="form-check-inline">
                                    <input type="radio" name="jenispendaftaran" id="jp" class="form-check-input" value="Pindahan"
                                    <?php if (isset($jenisPendaftaran) && $jenisPendaftaran =="Pindahan") echo "checked";?>
                                    >
                                    <label for="Siswa Baru">Pindahan</label>
                                </div>
                                <span class="warning"><?php echo $errorjensiPendaftaran; ?></span>
                            </div>
                        </div>
                        <!-- tanggal masuk sekolah date -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="tanggalmasuk" class="col-form-label"> Tanggal Masuk Sekolah</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="tglmsk" id="tglmsk" 
                                class="form-control <?php echo ($errortanggalmasuk !="" ? "is_invalid" : ""); ?>" 
                                value="<?php echo $tanggalmasuk; ?>">
                                <span class="warning"><?php echo $errortanggalmasuk; ?></span>
                            </div>
                        </div><br>
                        <!-- NIS text -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="nis" class="col-form-label"> NIS</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" name="nonis" id="nonis" 
                            class="form-control <?php echo ($nis !="" ? "is_invalid" : ""); ?>" 
                            maxlength="10" 
                            value="<?php echo $nis; ?>" placeholder="Masukan NIS Anda">
                            <span class="warning"><?php echo $errornis ?></span>
                            </div>
                        </div><br>
                        <!-- nomor peserta ujian text-texthelp -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="nopu" class="col-form-label"> Nomor Peserta Ujian</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" name="nopu" id="nopu" 
                            class="form-control <?php echo ($nopu !="" ? "is_invalid" : ""); ?>" 
                            maxlength="20" 
                            value="<?php echo $nopu; ?>" 
                            placeholder="Masukan Nomor Peserta Ujian Anda">
                                <!-- text help  -->
                            <div id="nopuhelp" class="form-text">**Nomor peserta ujian adalah 
                                20 digit yang tertera dalam sertifikat 
                                <span class="text-danger">SKHUN SD</span>, 
                                diisi bagi peserta jenjang SMP
                                </div>
                            <span class="warning"><?php echo $errornopu;?></span>
                            </div>
                        </div><br>
                        <!-- pernah paud radio  -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="pernahpaud" class="col-form-label"> Apakah Pernah Paud</label>
                            </div>
                            <div class="col-md-9">
                            <div class="form-check-inline">
                                <input type="radio" name="pernahpaud" id="paud" class="form-check-input" value="Ya" 
                                <?php if (isset($pernahpaud) && $pernahpaud =="Ya") echo "checked";?>>                    
                                <label for="pernahpaud">Ya</label>
                            </div>
                            <div class="form-check-inline">
                                    <input type="radio" name="pernahpaud" id="paud" class="form-check-input" value="Tidak" 
                                    <?php if (isset($pernahpaud) && $pernahpaud =="Tidak") echo "checked";?>
                                    >                                   
                                    <label for="pernahpaud">Tidak</label>
                                </div>
                                <span class="warning"><?php echo $errorpernahpaud; ?></span>
                            </div>
                        </div><br>
                        <!-- pernah tk radio  -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="pernahtk" class="col-form-label"> Apakah Pernah TK</label>
                            </div>
                            <div class="col-md-9">
                            <div class="form-check-inline">
                                <input type="radio" name="pernahtk" id="tk" class="form-check-input" value="Ya"
                                <?php if (isset($pernahtk) && $pernahtk =="Ya") echo "checked";?>>
                                <label for="pernahtk">Ya</label>
                            </div>
                            <div class="form-check-inline">
                                    <input type="radio" name="pernahtk" id="tk" class="form-check-input" value="Tidak"
                                    <?php if (isset($pernahtk) && $pernahtk =="Tidak") echo "checked";?>>
                                    <label for="pernahtk">Tidak</label>
                                </div>
                                <span class="warning"><?php echo $errorpernahtk; ?></span>
                            </div>
                        </div><br>
                        <!-- skhun text-help -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="noskhun" class="col-form-label"> Nomor seri SKHUN sebelumnya</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" name="noSKHUN" id="noSKHUN" 
                            class="form-control <?php echo ($skhun !="" ? "is_invalid" : ""); ?>" 
                            maxlength="20" 
                            value="<?php echo $skhun; ?>" placeholder="Masukan Nomor SKHUN">
                                <!-- text help  -->
                                <div id="noskhunhelp" class="form-text">diisi 16 digit yang tertera di
                                    <span class="text-danger">SKHUN SD</span>, 
                                    diisi bagi peserta jenjang SMP
                                </div>
                            <span class="warning"><?php echo $errorskhun; ?></span>
                            </div>
                        </div><br>
                        <!-- noijasah text-help  -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="noijzh" class="col-form-label"> Nomor seri IJAZAH sebelumnya</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" name="noijzh" id="noijzh" 
                            class="form-control  <?php echo ($ijazah !="" ? "is_invalid" : ""); ?>" 
                            maxlength="20" value="<?php echo $ijazah; ?>" placeholder="Masukan Nomor Ijazah">

                                <!-- text help  -->
                            <div id="noijzhhelp" class="form-text">diisi 16 digit yang tertera di
                                <span class="text-danger">IJAZAH SD</span>, 
                                diisi bagi peserta jenjang SMP
                            </div>

                            <span class="warning"><?php echo $errorijazah; ?></span>


                            </div>
                        </div><br>
                        <!-- hobi select  -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="selecthobi" class="col-form-label"> Hobi</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-select" name="hobi">
                                    <option>Silahkan Pilih</option>
                                    <option value="Olahraga"  <?php if (isset($hobi) && $hobi == "Olahraga") echo "selected";?>>Olahraga</option>
                                    <option value="Kesenian" <?php if (isset($hobi) && $hobi == "Kesenian") echo "selected";?>>Kesenian</option>
                                    <option value="Membaca" <?php if (isset($hobi) && $hobi == "Membaca") echo "selected";?>>Membaca</option>
                                    <option value="Menulis" <?php if (isset($hobi) && $hobi == "Menulis") echo "selected";?>>Menulis</option>
                                    <option value="Travelling" <?php if (isset($hobi) && $hobi == "Travelling") echo "selected";?>>Travelling</option>
                                    <option value="Lainya" <?php if (isset($hobi) && $hobi == "Lainya") echo "selected";?>>Lainya</option>                           
                                </select>
                                <span class="warning"><?php echo $errorhobi; ?></span>

                            </div>

                        </div><br>
                        <!-- cita cita select  -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="selectcita" class="col-form-label"> Cita - Cita</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-select" name="cita">
                                    <option>Silahkan Pilih</option>
                                    <option value="PNS"  <?php if (isset($cita) && $cita == "PNS") echo "selected";?>>PNS</option>
                                    <option value="TNI/Porli" <?php if (isset($cita) && $cita == "TNI?Porli") echo "selected";?>>TNI/Porli</option>
                                    <option value="Guru/Dosen" <?php if (isset($cita) && $cita == "Guru/Dosen") echo "selected";?>>Guru/Dosen</option>
                                    <option value="Dokter" <?php if (isset($cita) && $cita == "Dokter") echo "selected";?>>Dokter</option>
                                    <option value="Politikus" <?php if (isset($cita) && $cita == "Politikus") echo "selected";?>>Politikus</option>
                                    <option value="Wiraswasta" <?php if (isset($cita) && $cita == "Wiraswasta") echo "selected";?>>Wiraswasta</option>
                                    <option value="Seni/lukis/artis/sejenisnya" <?php if (isset($cita) && $cita == "Seni/lukis/artis/sejenisnya") echo "selected";?>>Seni/lukis/artis/sejenisnya</option>
                                    <option value="Lainya" <?php if (isset($cita) && $cita == "Lainya") echo "selected";?>>Lainya</option>                           
                                </select>
                                <span class="warning"><?php echo $errorcita; ?></span>
                            </div>
                        </div><br>
                    </div>

                <!-- button submit  -->
                <div class="form-group row ">
                <a href="datapribadi.php" type="submit" class="btn btn-primary">
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