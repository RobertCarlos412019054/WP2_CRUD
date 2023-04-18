<?php
include('koneksi.php');

// Validasi form
if (empty($_POST['judul']) || empty($_POST['isi']) || empty($_FILES['foto']['name'])) {
    header("Location: tambah.php?status=error&message=Form%20tidak%20boleh%20kosong");
    exit();
}

// Validasi file foto
$allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
$max_size = 5 * 1024 * 1024; // 5MB

if (!in_array(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION), $allowed_formats)) {
    header("Location: tambah.php?status=error&message=Format%20file%20tidak%20didukung");
    exit();
}

if ($_FILES['foto']['size'] > $max_size) {
    header("Location: tambah.php?status=error&message=Ukuran%20file%20tidak%20boleh%20lebih%20dari%205MB");
    exit();
}

// Generate nama file foto yang unik
$file_name = uniqid() . '_' . $_FILES['foto']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . $file_name;

// Upload file foto
if (!move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
    header("Location: tambah.php?status=error&message=Gagal%20upload%20file%20foto");
    exit();
}

// Simpan data ke database
$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
$query = "INSERT INTO post (judul, isi, foto) VALUES ('$judul', '$isi', '$file_name')";

if (mysqli_query($koneksi, $query)) {
    header("Location: dailypost.php?status=success&message=Data%20berhasil%20ditambahkan");
} else {
    header("Location: tambah.php?status=error&message=Gagal%20menambahkan%20data");
}

mysqli_close($koneksi);
