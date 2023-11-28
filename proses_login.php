<?php

require_once('koneksi.php');

//Menangkap request
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = ('$username') AND password = ('$password')");

// Mengecek pengguna
// if ($query != 0) {
if (mysqli_num_rows($query) != 0) {

    $row = mysqli_fetch_assoc($query);
    // Membuat session
    session_start();
    $_SESSION['id'] = $row['id'];
    header("location: http://localhost/uaspemweb/index.html");
} 
else {
    header("location: http://localhost/uaspemweb/login.html");
}



