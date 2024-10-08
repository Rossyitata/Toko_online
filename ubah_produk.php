<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ubah Produk</title>
    
</head>

<body>
    <?php
    include "koneksi.php";
    $qry_get_produk = mysqli_query($conn, "select * from produk where id_produk = '" . $_GET['id_produk'] . "'");
    $dt_produk = mysqli_fetch_array($qry_get_produk);
    ?>
    <h3>Ubah Produk</h3>
    <form action="proses_ubah_produk.php" method="post">
        <input type="hidden" name="id_produk" value="<?= $dt_produk['id_produk'] ?>" />
        Nama Produk :
        <input type="varchar" name="nama_produk" value="<?= $dt_produk['nama_produk'] ?>" class="form-control">
        Deskripsi :
        <input type="text" name="deskripsi" value="<?= $dt_produk['deskripsi'] ?>" class="form-control">
        Harga:
        <input type="int" name="harga" value="<?= $dt_produk['harga'] ?>" class="form-control">
        <br>
        <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>