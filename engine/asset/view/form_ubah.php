<html>
<head>
	<title>Ubah Data</title>
	<link rel="stylesheet" href="../css/ubah.css">
</head>
<body>
<section class="base">
	<h1>Ubah Data Siswa</h1>
	
	<?php
	// Load file koneksi.php
	include "../koneksi.php";
	
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$id = $_GET['id'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM users WHERE id='".$id."'";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="../controller/proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
	</tr>
	<tr>
		<td>No Absen</td>
		<td><input type="text" name="absen" value="<?php echo $data['absen']; ?>"></td>
	</tr>
	<tr>
			<td>Kelas</td>
			<td>
			<?php
			if($data['kelas'] == "XI TKJ 1"){
				echo "<input type='radio' name='kelas' value='XI TKJ 1' checked='checked'> XI TKJ 1";
				echo "<input type='radio' name='kelas' value='XI TKJ 2'> XI TKJ 2";
				echo "<input type='radio' name='kelas' value='XI TKJ 3'> XI TKJ 3";
			}else{
				if ($data['kelas'] == "XI TKJ 2") {
					echo "<input type='radio' name='kelas' value='XI TKJ 1'> XI TKJ 1";
					echo "<input type='radio' name='kelas' value='XI TKJ 2' checked='checked'> XI TKJ 2";
					echo "<input type='radio' name='kelas' value='XI TKJ 3'> XI TKJ 3";
				}else{
					echo "<div>";
					echo "<input type='radio' name='kelas' value='XI TKJ 1'> XI TKJ 1";
					echo "<input type='radio' name='kelas' value='XI TKJ 2'> XI TKJ 2";
					echo "<input type='radio' name='kelas' value='XI TKJ 3' checked='checked'> XI TKJ 3";
					echo "</div>";
				}
			}
			?>
			</td>
	</tr>
	<td>Foto</td>
	<tr>
		<td style="display:flex;">
			<input type="checkbox" name="ubah_foto" value="true" style="height: 25px; width: 25px;"> Ceklis jika ingin mengubah foto<br>
		</td>
		<td>
			<input type="file" name="foto">
		</td>
	</tr>
	</table>
	
	<hr>
	<div>
	<button type="submit" value="Ubah">Simpan Data</button>
	<a href="../../index.php"><button type="button" value="Batal">Batal</button></a>
	</div>
	
	<section>
	</form>
</body>
</html>
