<!-- login_check.php -->
<?php
session_start();

// cek apakah form telah disubmit
if(isset($_POST['submit'])){
	// ambil nilai username dan password yang diinputkan pengguna
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// cek apakah username dan password yang diinputkan sesuai
	if($username == "nimadeberliana" && $password == "123"){
        	// Jika benar, tampilkan informasi login
				echo "<h1>Login berhasil!</h1>";
				echo "Nama: nimadeberliana<br>";
				echo "Email: nimadeberliana@gmail.com<br>";
				echo "Hari: " . date('l') . "<br>";
				echo "Tanggal: " . date('d-M-Y') . "<br>";
				echo "Jam: " . date('H:i:s:A') . "<br>";
	}else{
		// jika tidak sesuai, tampilkan pesan error
		$error = "Username atau password salah";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Check</title>
</head>
<body>
	<?php
	if(isset($error)){
		echo "<p>".$error."</p>";
	}
	?>
</body>
</html>