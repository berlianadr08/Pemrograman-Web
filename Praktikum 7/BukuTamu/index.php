<!DOCTYPE html>
<html>
<head>
	<title>Buku Tamu</title>
</head>
<body>
	<h2>Form Buku Tamu</h2>
	<form method="POST" action="simpan.php">
		<label for="nama">Nama:</label><br>
		<input type="text" id="nama" name="nama" required><br><br>

		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br><br>

		<label for="isi">Isi Pesan:</label><br>
		<textarea id="isi" name="isi" required></textarea><br><br>

		<input type="submit" value="Kirim">
	</form>
</body>
</html>