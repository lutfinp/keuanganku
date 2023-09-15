<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="contact.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" href="keuanganku.png">
    <title>Contact</title>
</head>

<body>
    <?php
    include "../auth/db_connect.php";
    include "../component/navbar.php";
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pesan = $_POST['message'];

        $updateQuery = "UPDATE kontak SET nama = '$nama', email = '$email', pesan = '$pesan' WHERE username = '{$_SESSION['username']}'";
        $updateResult = mysqli_query($mysqli, $updateQuery);

        if ($updateResult) {
            echo '<script type ="text/JavaScript">';
            echo 'alert("Pesan Anda Sudah Masuk")';
            echo '</script>';
        }
    }
    ?>
    <div class="sosmed">
        <h1>GET IN TOUCH</h1>
        <table>
            <tr>
                <td><a href="#"><img src="Instagram.png" alt="Instagram"></a></td>
                <td><a href="#">keuanganku.id</a></td>
            </tr>
            <tr>
                <td><a href="#"><img src="youtube.png" alt="youtube"></a></td>
                <td><a href="#">KeuanganKu</a></td>
            </tr>
            <tr>
                <td><a href="#"><img src="twitter.png" alt="twitter"></a></td>
                <td><a href="#">KeuanganKu</a></td>
            </tr>
        </table>
    </div>
    <div class="something">
        <form action="contact.php" method="POST">
            <h2>SAY SOMETHING</h2>
            <table>
                <tr>
                    <td>
                        <input type="text" name="nama" placeholder="Your Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="email" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="message" placeholder="Message"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button name="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>