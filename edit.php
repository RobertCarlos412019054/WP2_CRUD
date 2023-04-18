<?php
//koneksi ke database
include 'koneksi.php';

//ambil id dari parameter URL
$id = $_GET['id'];

//query untuk mengambil data dari database
$query = "SELECT * FROM post WHERE id='$id'";
$hasil_query = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="shortcut icon" href="gambar/Logo1.png">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- costum css -->
    <link rel="stylesheet" href="style2.css">

</head>

<body>

    <div class="container">

        <section class="container-fluid mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
                <section class="col-12 ">

                    <form class="form-container" action="proses_edit.php" method="post" enctype="multipart/form-data">
                        <h4 class="text-center font-weight-bold"> Edit Postingan</h4>

                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" class="form-control" id="judul" value="<?php echo $data['judul']; ?>" name="judul">
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi:</label>
                            <textarea class="form-control" id="isi" name="isi"><?php echo $data['isi']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <input type="hidden" name="foto_lama" value="<?php echo $data['foto']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="foto_lama">Foto Lama:</label>
                            <img src="uploads/<?php echo $data['foto']; ?>" width="200">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="dailypost.php" class="btn btn-danger">Cancel</a>

                    </form>

    </div>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>