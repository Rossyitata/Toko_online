<?php
include "koneksi.php";

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

// Jika ada file foto yang diunggah
if ($_FILES['foto_produk']['name']) {
    $foto_produk = $_FILES['foto_produk']['name'];
    $tmp_foto_produk = $_FILES['foto_produk']['tmp_name'];

    // Tentukan folder tempat menyimpan foto
    $folder = "assets/foto_produk/";

    // Upload file foto ke folder yang ditentukan
    if (move_uploaded_file($tmp_foto_produk, $folder . $foto_produk)) {
        // Update dengan foto baru
        $update = mysqli_query($conn, "UPDATE produk SET 
            nama_produk = '$nama_produk', 
            deskripsi = '$deskripsi', 
            harga = '$harga', 
            foto_produk = '$foto_produk' 
            WHERE id_produk = '$id_produk'");
    } else {
        echo "<script>alert('Gagal mengunggah foto');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
        exit();
    }
} else {
    // Update tanpa mengubah foto
    $update = mysqli_query($conn, "UPDATE produk SET 
        nama_produk = '$nama_produk', 
        deskripsi = '$deskripsi', 
        harga = '$harga' 
        WHERE id_produk = '$id_produk'");
}

// Cek hasil query
if ($update) {
    echo "<script>alert('Berhasil mengubah data produk');location.href='tampil_produk.php';</script>";
} else {
    echo "<script>alert('Gagal mengubah data produk');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
}
?>