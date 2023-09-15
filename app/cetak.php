<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../app/cetak.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>Document</title>
</head>

<body>
    <?php
    include "../auth/db_connect.php";
    session_start();

    $result1 = "";
    $result2 = "";
    $flag=0;

    $sql_mask = "SELECT nom_masuk, cat_masuk, tgl_masuk FROM pemasukan WHERE username = '{$_SESSION['username']}'";
    $query_mask = mysqli_query($mysqli, $sql_mask);
    $sql_kel = "SELECT nom_keluar, cat_keluar, tgl_keluar FROM pengeluaran WHERE username = '{$_SESSION['username']}'";
    $query_kel = mysqli_query($mysqli, $sql_kel);
    ?>
    <div class="content">
        <h2 align="center">Laporan Pemasukan dan Pengeluaran KeuanganKu</h2>
        <table border="1">
            <tr>
                <td class="judul">Tanggal</td>
                <td class="judul">Pemasukan</td>
                <td class="judul">Catatan</td>
            </tr>
            <?php
            if ($flag == 0) {
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
            if ($flag == 0) {
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
        <script>
            window.print();
        </script>
    </div>
</body>

</html>