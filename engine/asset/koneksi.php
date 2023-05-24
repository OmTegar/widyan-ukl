<?php
$connect=mysqli_connect("localhost","root","","datasiswa");

if(!$connect){
    echo "Koneksi Gagal";
    die();
}
?>