<?php
require 'koneksi.php';
session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $sql = "SELECT * FROM `user` WHERE `username`='$_POST[username]' and `password`='$_POST[password]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (mysqli_num_rows($result) > 0) {
      $_SESSION["username"] = $row["username"];
      $_SESSION["id"] = $row["id"];
      $_SESSION["role"] = $row["role"];
      if ($_SESSION['role'] == 'user') {
        header('location: b_home.html');
      }
      if ($_SESSION['role'] == 'admin') {
        header('location: http://localhost/Redeo/admin/beranda.php');
      }
    } else {
      echo '
  <script>
    alert("User tidak ditemukan atau Password salah");
  </script>
  ';
    }
  } ?>
