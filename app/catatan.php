<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../app/catet.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=M PLUS Rounded 1c' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" href="keuanganku.png">
    <title>Feature | Catatan</title>
</head>

<body>
    <?php
    include "../auth/db_connect.php";
    include "../component/navbar.php";
    include "../component/fitur.php";

    if (isset($_POST['tambah'])) {
        $nom_masuk = $_POST['nominal_masuk'];
        $cat_masuk = $_POST['cat_masuk'];
        $tgl_masuk = $_POST['tgl_masuk'];

        $result=mysqli_query($mysqli, "INSERT INTO pemasukan (username, nom_masuk, cat_masuk, tgl_masuk) VALUES ('{$_SESSION['username']}', '$nom_masuk', '$cat_masuk', '$tgl_masuk')");
        if($result){
            echo '<script type ="text/JavaScript">';
            echo 'alert("Berhasil Menambah Pemasukan")';
            echo '</script>';
        }
    }

    if (isset($_POST['tambah2'])) {
        $nom_keluar = $_POST['nominal_keluar'];
        $cat_keluar = $_POST['cat_keluar'];
        $tgl_keluar = $_POST['tgl_keluar'];

        $result=mysqli_query($mysqli, "INSERT INTO pengeluaran (username, nom_keluar, cat_keluar, tgl_keluar) VALUES ('{$_SESSION['username']}', '$nom_keluar', '$cat_keluar', '$tgl_keluar')");
        if($result){
            echo '<script type ="text/JavaScript">';
            echo 'alert("Berhasil Menambah Pengeluaran")';
            echo '</script>';
        }
    }

    ?>
    <div class="catat">
        <div class="calender">
            <?php
            include "../app/calender.php"; 
            ?>
        </div>
        <div class="inputan">
            <div class="pemasukan">
                <h3>Pemasukan : </h3>
                <form action="catatan.php" method="POST">
                    <ul>
                        <li class="tanggal"><input type="date" name="tgl_masuk"></li>
                        <li class="nominal"><input type="text" name="nominal_masuk" placeholder="Nominal"></li>
                        <li class="catatan"><input type="text" name="cat_masuk" placeholder="Catatan"></li>
                    </ul>
                    <div class="tambah">
                        <button name="tambah">Tambah</button>
                    </div>
                </form>
            </div>
            <div class="pengeluaran">
                <h3>Pengeluaran : </h3>
                <form action="catatan.php" method="POST">
                    <ul>
                        <li class="tanggal"><input type="date" name="tgl_keluar"></li>
                        <li class="nominal"><input type="text" name="nominal_keluar" placeholder="Nominal"></li>
                        <li class="catatan"><input type="text" name="cat_keluar" placeholder="Catatan"></li>
                    </ul>
                    <div class="tambah">
                        <button name="tambah2">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>