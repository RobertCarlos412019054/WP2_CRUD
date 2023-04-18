<?php
//inisialisasi session
session_start();
//mengecek username pada session
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<?php include('index_head.php') ?>

<body style="background-color: rgb(0, 0, 0);">
    <div class="container">
        <div class="navbar">
            <a href="about.php">
                <img src="gambar/Logo1.png" class="logo">
            </a>
            <div class="judul">
                <h3>Con.spir.a.cy</h3>
            </div>
            <nav>
                <ul id="menuList">
                    <li><a href="tech.php">Tech</a></li>
                    <li><a href="health.php">Health</a></li>
                    <li><a href="social.php">Social</a></li>
                    <li><a href="politic.php">Politic</a></li>
                    <li><a href="dailypost.php">Daily Post</a></li>&emsp;
                    <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:35px;color:red"></i></a></li>
                    <!-- <li><a href="crud.php">add data</a></li> -->
                </ul>

            </nav>
            <img src="gambar/menu.png" class="menu-icon" onclick="togglemenu()">
        </div>
        <div class="row">
            <div class="col-1">
                <h2>For People Who<br>Seek The Truth.</h2>
            </div>
            <div class="col-2">
                <img src="gambar/Logo3.png" class="home">
            </div>
        </div>




        <!-- taruhcrud -->

        <!-- tambahkan link untuk menghubungkan ke Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    </div>

</body>

</html>