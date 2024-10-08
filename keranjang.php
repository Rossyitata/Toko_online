<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "toko_online";

$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel keranjang
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);


// Inisialisasi total harga
$total_harga = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Keranjang Belanja</h2>

<table>
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
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
    <tfoot>
        <tr>
            <th colspan="3">Total Keseluruhan</th>
            <th>Rp<?php echo number_format($subtotal, 2, ',', '.'); ?></th>
        </tr>
    </tfoot>
</table>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>