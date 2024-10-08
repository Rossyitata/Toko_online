<?php
include "header_admin.php";
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
        <h2 class="text-center my-4">Histori Transaksi</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Transaksi</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Ambil data transaksi dan detail transaksi dari database
                $qry_transaksi = mysqli_query($conn, 
                    "SELECT transaksi.*, pelanggan.nama as nama_pelanggan, petugas.nama_petugas 
                     FROM transaksi 
                     JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan 
                     JOIN petugas ON transaksi.id_petugas = petugas.id_petugas 
                     ORDER BY tgl_transaksi DESC");

                while ($dt_transaksi = mysqli_fetch_array($qry_transaksi)) {
                    // Ambil data detail transaksi berdasarkan id_transaksi
                    $id_transaksi = $dt_transaksi['id_transaksi'];
                    $qry_detail = mysqli_query($conn, 
                        "SELECT detail_transaksi.*, produk.nama_produk, produk.harga 
                         FROM detail_transaksi 
                         JOIN produk ON detail_transaksi.id_produk = produk.id_produk 
                         WHERE detail_transaksi.id_transaksi = '$id_transaksi'");

                    // Tampilkan data transaksi
                    while ($dt_detail = mysqli_fetch_array($qry_detail)) {
                        $subtotal = $dt_detail['qty'] * $dt_detail['harga']; // Hitung subtotal
                        echo "
                        <tr>
                            <td>".$dt_transaksi['id_transaksi']."</td>
                            <td>".$dt_transaksi['nama_pelanggan']."</td>
                            <td>".$dt_transaksi['nama_petugas']."</td>
                            <td>".$dt_transaksi['tgl_transaksi']."</td>
                            <td>".$dt_detail['nama_produk']."</td>
                            <td>".$dt_detail['qty']."</td>
                            <td>Rp. ".number_format($dt_detail['harga'], 0, ',', '.')."</td>
                            <td>Rp. ".number_format($subtotal, 0, ',', '.')."</td>
                        </tr>
                        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>