<html>

<head>
  <title>Tambah Data</title>
  <link rel="stylesheet" href="../css/simpan.css">
</head>

<body>
  <center>
    <h1>Tambah Data</h1>
    <center>
      <form method="post" action="../controller/proses_simpan.php" enctype="multipart/form-data">

        <section class="base">
          <div>
            <label>Nama</label>
            <input type="text" name="nama" />
          </div>
          <div>
            <label>Absen</label>
            <input type="text" name="absen" autofocus="" required="" />
          </div>
          <div>
            <label>Kelas</label>
            <td>
              <input type="radio" name="kelas" value="XI TKJ 1"> XI TKJ 1
              <input type="radio" name="kelas" value="XI TKJ 2"> XI TKJ 2
              <input type="radio" name="kelas" value="XI TKJ 3"> XI TKJ 3  
            </td>
          </div>
          <div>
            <label>Foto</label>
            <input type="file" name="foto" required="" />
          </div>

          <div>
            <button type="submit" value="Simpan">Simpan Data</button>
            <a href="../../index.php"><button type="button" value="Batal">Batal</button></a>
          </div>
        </section>
      </form>
</body>

</html>