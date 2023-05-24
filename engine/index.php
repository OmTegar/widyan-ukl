<?php
error_reporting(0);
include 'asset/koneksi.php';
?>
<html>

<head>
	<title>Data</title>
	<link rel="stylesheet" href="asset/css/style.css">
	
</head>

<body>
	<center>
		<h1>Data Siswa</h1>
		<a href="asset/view/form_simpan.php">+ Tambah Data</a><br>
		<form action="" method="POST">
			<input type="text" name="query" placeholder="Cari Data" />
			<input type="submit" name="cari" value="Search" />
		</form>
		<table border="1" width="100%">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>No Absen</th>
				<th>Kelas</th>
				<th>Foto</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php

			$no = 1;
			$query = $_POST['query'];

			$select = ($query != '') ? mysqli_query($connect, "SELECT * FROM users WHERE id LIKE '%" . $query . "%' OR nama LIKE '%" . $query . "%' ") : mysqli_query($connect, "SELECT * FROM  users");
			if (mysqli_num_rows($select)) {

				while ($data = mysqli_fetch_array($select)) {
					?>
					<tr>
						<td>
							<center>
								<?php echo $no++ ?>
							</center>
						</td>
						<td>
							<center>
								<?php echo $data['nama'] ?>
							</center>
						</td>
						<td>
							<center>
								<?php echo $data['absen'] ?>
							</center>
						</td>
						<td>
							<center>
								<?php echo $data['kelas'] ?>
							</center>
						</td>
						<td>
							<center>
								<?php echo "<img src='asset/images/" . $data['foto'] . "' width='100' height='140' >" ?>
							</center>
						</td>
						<td>
							<center><a href="asset/view/form_ubah.php?id=<?php echo $data['id'] ?>">Ubah </a></center>
						</td>
						<td>
							<center><a href="asset/controller/proses_hapus.php?id=<?php echo $data['id'] ?>"
									onclick="return confirm('Apakah anda yakin ingin menghapus data siswa <?php echo $data['nama']; ?> ? ')">
									Hapus </a></center>
						</td>
					</tr>

				<?php }
			} else {
				echo '<tr><td colspan="7"><center> Tidak ada data</center> </td></tr>';
			} ?>

		</table>
	</center>
</body>

</html>