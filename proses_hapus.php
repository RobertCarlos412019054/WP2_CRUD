<?php
// menghubungkan file koneksi.php
include_once("koneksi.php");

// mendapatkan id dari parameter GET
$id = $_GET['id'];

// query untuk menghapus data dari tabel post
$query = "DELETE FROM post WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// redirect ke halaman index.php setelah data berhasil dihapus
header("Location: dailypost.php");
exit;
