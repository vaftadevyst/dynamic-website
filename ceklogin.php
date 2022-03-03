<?php
session_start();
if(isset($_SESSION['email'])) {
    echo '<script>window.location.replace("./main.php");</script>';
} else {
$email = "test@gmail.com";
$password = "test123";
if(isset($_POST['email']) && isset($_POST['password'])) {
    if($_POST['email'] == $email && $_POST['password'] == $password) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        echo '<meta http-equiv="refresh" content="2; url=./main.php"/>';
        echo "<center>Berhasil, dalam 2 detik kamu akan dialihkan ke halaman utama</center>";
    } elseif($_POST['email'] != $email && $_POST['password'] == $password) {
        echo '<meta http-equiv="refresh" content="2; url=./index.php"/>';
        echo "<center>Gagal!, Email Salah</center>";
    } elseif($_POST['email'] == $email && $_POST['password'] != $password) {
        echo '<meta http-equiv="refresh" content="2; url=./index.php"/>';
        echo "<center>Gagal!, Password Salah</center>";
    } elseif($_POST['email'] != $email && $_POST['password'] != $password) {
        echo "<center>Gagal!, Email & Password Salah</center>";
        echo '<meta http-equiv="refresh" content="2; url=./index.php"/>';
    } 
} else {
    echo '<meta http-equiv="refresh" content="2; url=./index.php"/>';
    echo "<center>Gagal!, jangan biarkan email & password kosong</center>";
}
}
?>