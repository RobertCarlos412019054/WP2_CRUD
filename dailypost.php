<!DOCTYPE html>
<html>

<head>
    <title>Daily Post</title>
    <link rel="shortcut icon" href="gambar/Logo1.png">
    <style type="text/css">
        body {
            background-color: black;
        }

        * {
            margin: 0;
            padding: 0;
            /* font-family: sans-serif; */
        }

        .container {
            width: 100%;
            min-height: 100vh;
            padding-left: 8%;
            padding-right: 8%;
            box-sizing: border-box;
            overflow: hidden;
        }

        .container h1 {
            font-family: sans;
            font-size: 70px;
            text-align: center;
            color: orange;
        }

        .navbar {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .logo {
            width: 50px;
            cursor: pointer;
            margin: 30px 0;
        }

        .judul {
            position: absolute;
            width: 541px;
            height: 107px;
            left: 206px;
            top: 12px;
        }

        .lg {
            font-family: 'Rock Salt', cursive;
            font-size: 30px;
            color: rgba(9, 211, 20, 0.863);
        }

        .menu-icon {
            width: 25px;
            cursor: pointer;
            display: none;
        }

        nav {
            flex: 1;
            text-align: right;
        }

        nav ul li {
            display: inline-block;
            margin-right: 30px;
            margin-top: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: rgba(9, 211, 20, 0.863);
            font-size: 21px;
            font-family: 'Rock Salt', cursive;
        }

        nav ul li a:hover {
            color: rgba(247, 247, 247, 0.863);
            text-decoration: none;
        }
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <!-- link untuk menghubungkan ke Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body style="background-color: black;">
    <div class="container-fluid">
        <div class="navbar">
            <a class="lg" style="color: rgba(9, 211, 20, 0.863)">
                &emsp;<img src="gambar/Logo1.png" class="logo">&emsp;Daily Post
            </a>

            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="tech.php">Tech</a></li>
                    <li><a href="health.php">Health</a></li>
                    <li><a href="social.php">Social</a></li>
                    <li><a href="politic.php">Politic</a></li>
                    <!-- <li><a href="dailypost.php">Daily Post</a></li> -->
                    <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:35px;color:red"></i></a></li>
                </ul>
            </nav>
            <img src="gambar/menu.png" class="menu-icon" onclick="togglemenu()">
        </div>
    </div>


    <div class="container">

        <br><br>
        <!-- <marquee behavior="scroll" direction="left"> -->
        <marquee direction="right" behavior="scroll" scrollamount="30" scrolldelay="40">
            <h1>OUR DAILY POST</h1><br><br>
        </marquee>
        <p><a href="tambah.php" class="btn btn-primary"><i class="fa fa-plus-square" style="font-size:25px;color:white"> Add Post</i></a></p>
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
                        <div class="card" style="background-color: #ebeff3;">
                            <img src="uploads/<?= $row["foto"] ?>" width="40px" class="card-img-top" alt="<?= $row["judul"] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["judul"] ?></h5>
                                <p class="card-text"><?= $row["isi"] ?></p>
                                <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-success"><i class='fas fa-edit' style='font-size:15px;color:white'> Edit</i></a>
                                <a href="proses_hapus.php?id=<?= $row["id"] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class='fas fa-trash-alt' style='font-size:15px;color:white'> Delete</i></a>
                            </div>
                        </div><br>
                    </div>
            <?php
                }
            } else {
                echo "<p style='color: white;'><br><br><b>Belum ada data.</b></p>";
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