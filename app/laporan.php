<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../app/laporan.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" href="keuanganku.png">
    <title>Feature | Laporan</title>
</head>

<body>
    <?php
    include "../auth/db_connect.php";
    include "../component/navbar.php";
    include "../component/fitur.php";

    $result1 = "";
    $result2 = "";
    $flag=0;

    if (isset($_POST['input'])) {
        $tgl_awal = $_POST['awal'];
        $tgl_akhir = $_POST['akhir'];

        $sql1 = "SELECT nom_masuk, cat_masuk, tgl_masuk FROM pemasukan WHERE username = '{$_SESSION['username']}' AND tgl_masuk>='$tgl_awal' AND tgl_masuk<='$tgl_akhir'";
        $select1 = mysqli_query($mysqli, $sql1);
        $result1 = mysqli_num_rows($select1);
        $sql2 = "SELECT nom_keluar, cat_keluar, tgl_keluar FROM pengeluaran WHERE username = '{$_SESSION['username']}' AND tgl_keluar>='$tgl_awal' AND tgl_keluar<='$tgl_akhir'";
        $select2 = mysqli_query($mysqli, $sql2);
        $result2 = mysqli_num_rows($select2);
        $flag=1;
    } else {
        $sql_mask = "SELECT nom_masuk, cat_masuk, tgl_masuk FROM pemasukan WHERE username = '{$_SESSION['username']}'";
        $query_mask = mysqli_query($mysqli, $sql_mask);
        $sql_kel = "SELECT nom_keluar, cat_keluar, tgl_keluar FROM pengeluaran WHERE username = '{$_SESSION['username']}'";
        $query_kel = mysqli_query($mysqli, $sql_kel);
    }

    ?>
    <div class="content">
        <div class="tanggal">
            <form method="POST">
                <ul>
                    <li>Tanggal Awal : <input type="date" name="awal" id=""> </li>
                    <li>Tanggal Akhir : <input type="date" name="akhir" id=""></li>
                </ul>
                <div class="cetak">
                        <button name="input">input</button>
                    </div>
            </form>
        </div>
        <table border="1">
            <tr>
                <td class="judul">Tanggal</td>
                <td class="judul">Pemasukan</td>
                <td class="judul">Catatan</td>
            </tr>
            <?php
            if ($flag==0) {
                while ($row = mysqli_fetch_array($query_mask)) {
                    echo '
                    <tr>
                        <td>' . $row['tgl_masuk'] . '</td>
                        <td>' . $row['nom_masuk'] . '</td>
                        <td>' . $row['cat_masuk'] . '</td>
                    </tr>';
                }
            }
            ?>
            <?php
            if ($result1 > 0) {
                while ($row = mysqli_fetch_array($select1)) {
                    echo '
                    <tr>
                        <td>' . $row['tgl_masuk'] . '</td>
                        <td>' . $row['nom_masuk'] . '</td>
                        <td>' . $row['cat_masuk'] . '</td>
                    </tr>';
                }
            }
            ?>
        </table>
        <table border="1">
            <tr>
                <td class="judul">Tanggal</td>
                <td class="judul">Pengeluaran</td>
                <td class="judul">Catatan</td>
            </tr>
            <?php
            if ($flag==0) {
                while ($row = mysqli_fetch_array($query_kel)) {
                    echo '
                    <tr>
                        <td>' . $row['tgl_keluar'] . '</td>
                        <td>' . $row['nom_keluar'] . '</td>
                        <td>' . $row['cat_keluar'] . '</td>
                    </tr>';
                }
            }
            ?>
            <?php
            if ($result2 > 0) {
                while ($row = mysqli_fetch_array($select2)) {
                    echo '
                    <tr>
                        <td>' . $row['tgl_keluar'] . '</td>
                        <td>' . $row['nom_keluar'] . '</td>
                        <td>' . $row['cat_keluar'] . '</td>
                    </tr>';
                }
            }
            ?>
        </table>
        <div class="cetak">
            <a href="../app/cetak.php" target="_blank"><button>Cetak Laporan</button></a>
        </div>
    </div>

</body>

</html>