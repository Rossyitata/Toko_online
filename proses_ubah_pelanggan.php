<?php
include "koneksi.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$password = $_POST['password']; // Tangkap password baru jika ada

// Jika ada file foto yang diunggah
if ($_FILES['foto_pelanggan']['name']) {
    $foto = $_FILES['foto_pelanggan']['name'];
    $tmp_foto = $_FILES['foto_pelanggan']['tmp_name'];

    // Tentukan folder tempat menyimpan foto
    $folder = "asset/foto_pelanggan/";

    // Upload file foto ke folder yang ditentukan
    if (move_uploaded_file($tmp_foto_pelanggan, $folder . $foto_pelanggan)) {
        // Update dengan foto baru
        $update = mysqli_query($conn, "UPDATE pelanggan SET 
            nama = '$nama', 
            username = '$username', 
            alamat = '$alamat', 
            telp = '$telp', 
            foto = '$foto' 
            WHERE id_pelanggan = '$id_pelanggan'");
    } else {
        echo "<script>alert('Gagal mengunggah foto');location.href='ubah_pelanggan.php?id_pelanggan=$id_pelanggan';</script>";
        exit();
    }
} else {
    // Update tanpa mengubah foto
    $update = mysqli_query($conn, "UPDATE pelanggan SET 
        nama = '$nama', 
        username = '$username', 
        alamat = '$alamat', 
        telp = '$telp' 
        WHERE id_pelanggan = '$id_pelanggan'");
}

// Cek apakah ada password baru yang diisi
if (!empty($password)) {
    // Update password jika ada
    $hashed_password = md5($password); // Enkripsi password menggunakan md5
    $update_password = mysqli_query($conn, "UPDATE pelanggan SET 
        password = '$hashed_password' 
        WHERE id_pelanggan = '$id_pelanggan'");
}

// Cek hasil query
if ($update && (!empty($password) ? $update_password : true)) {
    echo "<script>alert('Berhasil mengubah data pelanggan');location.href='tampil_pelanggan.php';</script>";
} else {
    echo "<script>alert('Gagal mengubah data pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=$id_pelanggan';</script>";
}
?>