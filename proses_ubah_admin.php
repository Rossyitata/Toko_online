<?php
if ($_POST) {
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas= $_POST['nama_petugas'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    if (empty($nama_petugas)) {
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='tambah_admin.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_admin.php';</script>";
    } else {
        include "koneksi.php";
        if (empty($password)) {
            $update = mysqli_query($conn, "update petugas set nama_petugas='" . $nama_petugas . "',username='" . $username . "', level='" . $level. "' where id_petugas= '" . $id_petugas . "' ") or die(mysqli_error($conn));
            if ($update) {
                echo "<script>alert('Sukses update pegawai');location.href='tampil_admin.php';</script>";
            } else {
                echo "<script>alert('Gagal update pegawai');location.href='ubah_admin.php?id_petugas=" . $id_petugas . "';</script>";
            }
        } else {
            $update = mysqli_query($conn, "update petugas set nama_petugas='" . $nama_petugas . "',username='" . $username . "', password='" . md5($password) . "', level='" . $level . "' where id_petugas = '" . $id_petugas . "'") or die(mysqli_error($conn));
            if ($update) {
                echo "<script>alert('Sukses update pegawai');location.href='tampil_admin.php';</script>";
            } else {
                echo "<script>alert('Gagal update pegawai');location.href='ubah_admin.php?id_petugas=" . $id_petugas . "';</script>";
            }
        }

    }
}

?>