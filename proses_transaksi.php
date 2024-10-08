<?php
include "koneksi.php";

// Ambil data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$id_petugas = $_POST['id_petugas'];
$tgl_transaksi = $_POST['tgl_transaksi'];

// Simpan data transaksi ke tabel transaksi
$insert_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_pelanggan, id_petugas, tgl_transaksi) VALUES ('$id_pelanggan', '$id_petugas', '$tgl_transaksi')");

// Ambil ID Transaksi terakhir
$id_transaksi = mysqli_insert_id($conn);

// Simpan detail transaksi (produk dan qty)
$produk = $_POST['produk'];

$qty = $_POST['qty'];

for ($i = 0; $i < count($produk); $i++) {
    if ($qty[$i] > 0) {
        $id_produk = $produk[$i];
        $jumlah = $qty[$i];
        mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty) VALUES ('$id_transaksi', '$id_produk', '$jumlah')");
    }
}

echo "<script>alert('Transaksi berhasil ditambahkan');location.href='keranjang.php';</script>";
?>