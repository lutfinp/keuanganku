<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/profil.css">
    <link rel="icon" href="keuanganku.png">
    <title>Profil</title>
</head>

<body>
    <?php
    include "../auth/db_connect.php";
    include "../component/navbar.php";

    $email = "";
    $pass = "";
    $notel = "";

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $notel = $_POST['notel'];

        $updateQuery = "UPDATE login SET email = '$email', nama = '$nama', pass = '$pass', notelp = '$notel' WHERE username = '{$_SESSION['username']}'";
        $updateResult = mysqli_query($mysqli, $updateQuery);

        if ($updateResult) {
            echo '<script type ="text/JavaScript">';
            echo 'alert("Berhasil Mengubah Data Diri")';
            echo '</script>';
        }
    }

    ?>
    <div class="profil">
        <form action="../app/profil.php" method="POST">
            <?php
                $sql = "SELECT username, nama, email, notelp, pass FROM login WHERE username = '{$_SESSION['username']}'";
                $result = mysqli_query($mysqli, $sql);
                if ($result) {
                    $row = mysqli_fetch_array($result);

                    echo '
                    <label for="username">Username :</label>
                    <input class="username" type="text" placeholder="username" name="username" value="' . $row['username'] . '"  readonly>

                    <label for="nama">nama lengkap :</label>
                    <input class="fullname" type="text" placeholder="nama lengkap" name="nama" value="' . $row['nama'] . '">

                    <label for="email">Email :</label>
                    <input class="email" type="email" name="email" placeholder="email" value="' . $row['email'] . '">

                    <label for="pass">Password :</label>
                    <input class="pass" type="password" name="password" placeholder="password" value="' . $row['pass'] . '">

                    <label for="phone">Nomor Telepon :</label>
                    <input class="phone" type="tel" name="notel" placeholder="Nomor Telepon" value="' . $row['notelp'] . '">
                    
                    <div class="tombol">
                        <button type="submit" name="submit">Simpan</button>
                    </div>';
                };
            ?>
        </form>
        <div class="tombol" id="logout">
            <a href="../index.php"><button type="submit" name="Logout">Logout</button></a>
        </div>
    </div>
</body>

</html>