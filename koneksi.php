<?php
// Definisikan konfigurasi database
$host = "localhost"; //nama host server MySQL
$user = "root"; //nama user untuk mengakses database
$password = ""; //password untuk mengakses database
$dbname = "tugasteam"; //nama database yang akan diakses

// Membuat koneksi ke database MySQL
$koneksi = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi apakah berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
