<?php
include "db_connect.php";
session_start();

$username = trim($_POST['username']);
$nama = trim($_POST['nama']);
$email = trim($_POST['email']);
$telepon = trim($_POST['telepon']);
$password = trim($_POST['password']);

$_SESSION['username'] = $username;

mysqli_query($mysqli, "INSERT INTO login (username, nama, email, notelp, pass) VALUES ('$username', '$nama','$email', $telepon, '$password')");
mysqli_query($mysqli, "INSERT INTO target (username) VALUES ('$username')");
mysqli_query($mysqli, "INSERT INTO kontak (username) VALUES ('$username')");
header("location:../app/home.php");

?>