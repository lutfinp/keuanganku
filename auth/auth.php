<?php
include 'db_connect.php';
session_start();

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$_SESSION['username'] = $username;

$query = mysqli_query($mysqli, "SELECT * from login where username = '$username' and pass = '$password'");
$result = mysqli_num_rows($query);

if ($result > 0) {
    header("location:../app/home.php");
} 
else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("Username atau Password Anda Salah")';
    echo '</script>';
    header("location:../login.html?pesan=error");
}

?>