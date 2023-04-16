<!DOCTYPE html>
<html>
<head>
	<title>Biodata</title>
	<style>
		form {
			width: 50%;
			margin: auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-shadow: 0 0 10px #ccc;
		}
		label {
			display: inline-block;
			width: 100px;
			margin-bottom: 10px;
		}
		input[type=text], input[type=number] {
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 250px;
		}
		input[type=submit] {
			padding: 5px 10px;
			border-radius: 5px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			cursor: pointer;
		}
		h1, h2 {
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Biodata</h1>
	<form method="post">
		<label for="nama">Nama: </label>
		<input type="text" id="nama" name="nama"><br><br>
		
		<label for="npm">NPM: </label>
		<input type="text" id="npm" name="npm"><br><br>

        <label for="alamat">Alamat: </label>
		<input type="text" id="alamat" name="alamat"><br><br>
		
		<label for="umur">Usia: </label>
		<input type="number" id="umur" name="umur"><br><br>
		
		<label for="pekerjaan">Pekerjaan: </label>
		<input type="text" id="pekerjaan" name="pekerjaan"><br><br>
		
		<input type="submit" name="submit" value="Submit">
	</form>
	
	<?php
	if(isset($_POST['submit'])){
		$nama = $_POST['nama'];
        $npm = $_POST['npm'];
		$alamat = $_POST['alamat'];
		$umur = $_POST['umur'];
		$pekerjaan = $_POST['pekerjaan'];
		
		echo "<h2>Hasil:</h2>";
		echo "<p><strong>Nama:</strong> ".$nama."</p>";
        echo "<p><strong>NPM:</strong> ".$npm."</p>";
		echo "<p><strong>Alamat:</strong> ".$alamat."</p>";
		echo "<p><strong>Umur:</strong> ".$umur."</p>";
		echo "<p><strong>Pekerjaan:</strong> ".$pekerjaan."</p>";
	}
	?>
</body>
</html>