<?php
session_start();
unset($_SESSION['cart'][$_GET['id_produk']]);
header('location: keranjang.php');
?>