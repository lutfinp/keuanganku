<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="target.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" href="keuanganku.png">
    <title>Feature | Target</title>
</head>

<body>
    <?php
    include "../auth/db_connect.php";
    include "../component/navbar.php";
    include "../component/fitur.php";

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama_target'];
        $harga = $_POST['harga_target'];
        $jumlah = $_POST['jumlah_bulan'];

        $updateQuery = "UPDATE target SET nama_target = '$nama', harga_target = '$harga', rencana = '$jumlah' WHERE username = '{$_SESSION['username']}'";
        $updateResult = mysqli_query($mysqli, $updateQuery);
    }

    if (isset($_POST['selesai'])) {
        $deleteQuery = "DELETE FROM target WHERE username = '{$_SESSION['username']}'";
        $deleteResult = mysqli_query($mysqli, $deleteQuery);
        mysqli_query($mysqli, "INSERT INTO target (username) VALUES ('{$_SESSION['username']}')");
    }

    ?>

    <form action="../app/target.php" method="POST">
        <div class="input">
            <p><b>Target Tabungan:</b></p>
            <input type="text" name="nama_target" placeholder="Nama Target">
            <input type="text" name="harga_target" placeholder="Harga Target">
            <p><b>Rincian Pengisian:</b></p>
            <input type="text" name="jumlah_bulan" placeholder="Jumlah Bulan">
        </div>
        <button type="submit" id="submit-button" name="tambah">Tambah</button>
    </form>
    <div class="result-container">
        <?php
        try {
            $sql = "SELECT nama_target, harga_target, rencana FROM target WHERE username = '{$_SESSION['username']}'";
            $result = mysqli_query($mysqli, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);

                if ($row['rencana'] != 0) {
                    $hasil = intval($row['harga_target'] / $row['rencana']);

                    echo '<p id="nama-target-result">Nama Target : ' . $row['nama_target'] . '</p>
                  <p id="harga-target-result">Harga Target : Rp' . $row['harga_target'] . '</p>
                  <p id="option-result">Rencana Pengisian : ' . $row['rencana'] . ' Bulan</p>
                  <p id="nominal-pengisian-result">Nominal Menabung : Rp' . $hasil . ' per Bulan</p>
                  <div id="nominal-checkbox"></div>';
                }
                else {
                    throw new Exception('Anda belum mempunyai target');
                }
            } 
        } catch (Exception $e) {
            echo $e->getMessage();
        }


        ?>
    </div>
    <div class="selesai">
        <form action="target.php" method="POST">
            <button type="submit" id="selesai-button" name="selesai">Selesai</button>
        </form>
    </div>
</body>

</html>