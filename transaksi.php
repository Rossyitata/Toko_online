<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center my-4">Tambah Transaksi</h2>
        <form action="proses_transaksi.php" method="POST">
            <!-- Pilih Pelanggan -->
            <div class="mb-3">
                <label for="id_pelanggan" class="form-label">Pelanggan</label>
                <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                    <option value="" selected disabled>Pilih Pelanggan</option>
                    <?php
                    $qry_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                    while ($pelanggan = mysqli_fetch_array($qry_pelanggan)) {
                        echo "<option value='".$pelanggan['id_pelanggan']."'>".$pelanggan['nama']."</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Pilih Petugas -->
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Petugas</label>
                <select name="id_petugas" id="id_petugas" class="form-select" required>
                    <option value="" selected disabled>Pilih Petugas</option>
                    <?php
                    $qry_petugas = mysqli_query($conn, "SELECT * FROM petugas");
                    while ($petugas = mysqli_fetch_array($qry_petugas)) {
                        echo "<option value='".$petugas['id_petugas']."'>".$petugas['nama_petugas']."</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Input Tanggal Transaksi -->
            <div class="mb-3">
                <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control" required>
            </div>

            <!-- Pilih Produk dan Input Qty -->
            <div class="mb-3">
                <label for="produk_qty" class="form-label">Produk dan Qty</label>
                <?php
                $qry_produk = mysqli_query($conn, "SELECT * FROM produk where id_produk = '" . $_GET['id_produk'] . "'");
                while ($produk = mysqli_fetch_array($qry_produk)) {
                    echo "
                    <div class='input-group mb-2'>
                        <span class='input-group-text'>".$produk['nama_produk']."</span>
                        <input type='hidden' name='produk[]' value='".$produk['id_produk']."'>
                        <input type='number' name='qty[]' class='form-control' min='0' placeholder='Jumlah' value='0'>
                    </div>
                    ";
                }
                ?>
            </div>

            <button type="submit" class="btn btn-primary">masukkan keranjang</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>