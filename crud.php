<!DOCTYPE html>
<html>

<head>
    <title>Data</title>
    <!-- tambahkan link untuk menghubungkan ke Bootstrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
</head>

<body>
    <div class="container">
        <h1>Post</h1>
        <p><a href="tambah.php" class="btn btn-primary">Tambah Data</a></p>
        <div class="row">
            <?php
            // mengambil koneksi ke basis data
            include 'koneksi.php';

            // mengambil data dari basis data
            $sql = "SELECT * FROM post";
            $result = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data setiap baris
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-sm-12 mb-12">
                        <div class="card">
                            <img src="<?= $row["foto"] ?>" class="card-img-top" alt="<?= $row["judul"] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["judul"] ?></h5>
                                <p class="card-text"><?= $row["isi"] ?></p>
                                <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-warning">Edit</a>
                                <a href="proses_hapus.php?id=<?= $row["id"] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </div>
                        </div><br>
                    </div>
            <?php
                }
            } else {
                echo "<p>Belum ada data.</p>";
            }

            mysqli_close($koneksi);
            ?>
        </div>
    </div>
    <!-- tambahkan link untuk menghubungkan ke Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>