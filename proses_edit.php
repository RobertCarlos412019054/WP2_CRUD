<?php
// koneksi ke database
include 'koneksi.php';

// mendapatkan data dari form edit
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

// cek apakah user memilih foto baru atau tidak
if ($_FILES['foto']['error'] === 4) {
  // jika tidak memilih foto baru, maka gunakan foto yang sudah ada di database
  $foto = $_POST['foto_lama'];
} else {
  // jika memilih foto baru, maka upload foto tersebut
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
                    alert('Yang anda upload bukan gambar!');
                  </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  // 5242880
  if ($ukuranFile > 500000) {
    echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                  </script>";
    return false;
  }

  // generate nama file baru agar tidak terjadi duplikasi
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // upload gambar ke folder uploads/
  move_uploaded_file($tmpName, 'uploads/' . $namaFileBaru);

  // set foto dengan nama file baru
  $foto = $namaFileBaru;
}

// update data ke database
$query = "UPDATE post SET judul='$judul', isi='$isi', foto='$foto' WHERE id=$id";
$hasil_query = mysqli_query($koneksi, $query);

// cek apakah query berhasil dijalankan
if (!$hasil_query) {
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}

// redirect ke halaman utama
header("location: dailypost.php");
exit;
