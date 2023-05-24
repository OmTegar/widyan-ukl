<?php
// error_reporting(0);
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'engine/asset/koneksi.php';

$query = isset($_POST['query']) ? $_POST['query'] : '';

$select = ($query != '') ? mysqli_query($connect, "SELECT * FROM users WHERE id LIKE '%" . $query . "%' OR nama LIKE '%" . $query . "%' ") : mysqli_query($connect, "SELECT * FROM  users");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="contact.css"> -->
    <link rel="stylesheet" href="engine/asset/css/simpan.css">

    <title>Data</title>

    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .navbar {
            background-color: #3C6786;
            display: flex;
            width: auto;
            height: 10vh;
            color: white;
            font-weight: bold;
            justify-content: space-between;
            padding: 25px;
            align-items: center;
        }

        .navbar-list {
            display: flex;
            list-style: none;
        }

        .navbar-item {
            margin-right: 25px;
        }

        h1 {
            text-transform: uppercase;
            color: #9400D3;
        }

        button {
      background-color: #9400D3;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
      border: 0px;
      margin-top: 20px;
}

        /* label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        } */

        /* input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        } */

        /* div {
            width: 100%;
            height: auto;
        } */

        .base {
            /* width: 400px; */
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            /* background: #ededed; */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #9400D3;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

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
                        <a class="nav-link active" href="data.php">Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div style="padding: 20px;">
            <h3 class="mt-3">List Data</h3>
            <!-- Add Contact Button and Search Form-->
            <div class="row my-3">
                <!-- Add Contact Button -->
                <div class="col">
                    <!-- Add Button -->
                    <button type="button" class="btn text-light bg-blue" data-bs-toggle="modal"
                        data-bs-target="#addContact"
                        style="background-color: #9400D3;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
      border: 0px;
      margin-top: 20px;">+Add Data</button>
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
                                    <form method="post" action="engine/asset/controller/proses_simpan.php"
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
                                                <a href="data.php"><button type="button"
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
                    <form class="d-flex" style="display: flex;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            style="padding: 8px;">
                        <button class="btn bg-blue search-button" type="submit"
                            style="background-color: blue; border: none; padding: 8px;">
                            <img src="img/search.png" style="width: 20px; height: 20px;">
                        </button>
                    </form>
                </div>

            </div>



            <!-- Cards -->
            <?php if (mysqli_num_rows($select) > 0) { ?>
                <table>
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
                    while ($data = mysqli_fetch_array($select)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $no++ ?>
                            </td>
                            <td>
                                <?php echo $data['nama'] ?>
                            </td>
                            <td>
                                <?php echo $data['absen'] ?>
                            </td>
                            <td>
                                <?php echo $data['kelas'] ?>
                            </td>
                            <td>
                                <?php echo "<img src='engine/asset/images/" . $data['foto'] . "' width='100' height='140' >" ?>
                            </td>
                            <td><a href="engine/asset/view/form_ubah.php?id=<?php echo $data['id'] ?>">Ubah</a></td>
                            <td><a href="engine/asset/controller/proses_hapus.php?id=<?php echo $data['id'] ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data siswa <?php echo $data['nama']; ?> ? ')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            <?php } else { ?>
                <p>Tidak ada data</p>
            <?php } ?>
        </div>
    </main>

    <!-- Add Modal -->
    <div class="row my-3">
    <!-- Add Contact Button -->
    <div class="col">
        <!-- Add Button -->
        <button type="button" class="btn text-light bg-blue" data-toggle="modal" data-target="#addContact">+ Add Data</button>
        <!-- Add Modal -->
        <div class="modal fade" id="addContact" tabindex="-1" aria-labelledby="addContactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-blue text-light">
                        <h5 class="modal-title" id="addContactLabel">Add Data</h5>
                        <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../controller/proses_simpan.php" enctype="multipart/form-data">
                            <section class="base">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="absen">Absen</label>
                                    <input type="text" id="absen" name="absen" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <div class="radio-group">
                                        <input type="radio" id="kelas1" name="kelas" value="XI TKJ 1">
                                        <label for="kelas1">XI TKJ 1</label>
                                        <input type="radio" id="kelas2" name="kelas" value="XI TKJ 2">
                                        <label for="kelas2">XI TKJ 2</label>
                                        <input type="radio" id="kelas3" name="kelas" value="XI TKJ 3">
                                        <label for="kelas3">XI TKJ 3</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" id="foto" name="foto" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn bg-blue text-light">Simpan Data</button>
                                    <a href="data.php" class="btn bg-red text-light">Batal</a>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Form -->
    <!-- <div class="col">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn bg-blue search-button" type="submit"><img src="img/search.png"></button>
        </form>
    </div> -->
</div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteContact" tabindex="-1" aria-labelledby="deleteContactLabel" aria-hidden="true">
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

    <!-- <script src="index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>

</body>

</html>