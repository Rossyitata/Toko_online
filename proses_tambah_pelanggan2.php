<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif', 'JPG');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];  
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:tambah_pelanggan2.php?alert=gagal_ekstensi");
    } else {
        if ($ukuran < 1044070) {
            $xx = $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/foto_pelanggan/' . '' . $filename);
        }

        if (empty($nama)) {
            echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan2.php';</script>";
        } elseif (empty($username)) {
            echo "<script>alert('Username tidak boleh kosong');location.href='tambah_pelanggan2.php';</script>";
        } elseif (empty($password)) {
            echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan2.php';</script>";
        } else {
            include "koneksi.php";
            $insert = mysqli_query($conn, "INSERT INTO pelanggan (nama , username , password , alamat, telp, foto) value ('" . $nama . "','" . $username . "','" . md5($password) . "','" . $alamat . "','" . $telp . "','" . $xx . "')") or die(mysqli_error($conn));
            if ($insert) {
                echo "<script>alert('Sukses menambahkan Pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan2.php';</script>";
            }
        }
    }
}
?>