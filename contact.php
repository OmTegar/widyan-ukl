<?php
// error_reporting(0);
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'engine/asset/koneksi.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="engine/asset/css/simpan.css">
    <title>Data</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-logo" href="index.html"><b>LOGO</b></a>
            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.html">Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <h3 class="mt-3">List Data</h3>
            <!-- Add Contact Button and Search Form-->
            <div class="row my-3">
                <!-- Add Contact Button -->
                <div class="col">
                    <!-- Add Button -->
                    <button type="button" class="btn text-light bg-blue" data-bs-toggle="modal"
                        data-bs-target="#addContact">+ Add Data</button>
                    <!-- Add Modal -->
                    <div class="modal fade" id="addContact" tabindex="-1" aria-labelledby="addContactLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-blue text-light">
                                    <h5 class="modal-title" id="addContactLabel">Add Contact</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form method="post" action="../controller/proses_simpan.php"
                                        enctype="multipart/form-data">

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
                                                <a href="../../index.php"><button type="button"
                                                        value="Batal">Batal</button></a>
                                            </div>
                                        </section>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Form -->

                <div class="col">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn bg-blue search-button" type="submit"><img src="img/search.png"></button>
                    </form>
                </div>
            </div>

            <!-- Deleted Alert -->
            <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Deleted!</strong> Record was deleted successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->

            <!-- Cards -->
            <div class="row mt-4" id="listContact">

            </div>

            <!-- Edit Modal  -->
            <div class="modal fade" id="editContact" tabindex="-1" aria-labelledby="editContactLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-blue text-light">
                            <h5 class="modal-title" id="editContactLabel">Edit Contact</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <center>
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
                                                        <?php echo "<img src='engine/asset/images/" . $data['foto'] . "' width='100' height='140' >" ?>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center><a
                                                            href="engine/asset/view/form_ubah.php?id=<?php echo $data['id'] ?>">Ubah
                                                        </a></center>
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

                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteContact" tabindex="-1" aria-labelledby="deleteContactLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-blue text-light">
                            <h5 class="modal-title" id="deleteContactLabel">Delete Contact</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container text-center">
                                <form>
                                    <p>Are you sure to delete the contact?</p>
                                    <button type="submit" class="btn btn-success modal-button mx-2"
                                        id="deleteContactYes">YES</button>
                                    <button type="submit" class="btn btn-danger modal-button mx-2">CANCEL</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <script src="index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>

</body>

</html>