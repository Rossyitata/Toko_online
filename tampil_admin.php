<?php
include "header_admin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <section class="vh-100" style="background-color: #2779e2;"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tampil Pegawai</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center my-4">Tampil Admin</h3>
        <div class="table-container">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $qry_petugas = mysqli_query($conn, "SELECT * FROM petugas");

                    $no = 0;
                    while ($data_petugas = mysqli_fetch_array($qry_petugas)) {
                        $no++; ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_petugas['nama_petugas'] ?></td>
                            <td><?= $data_petugas['level'] ?></td>
                            <td>
                                <a href="ubah_admin.php?id_petugas=<?= $data_petugas['id_petugas'] ?>" class="btn btn-success">Ubah</a> |
                                <a href="hapus_admin.php?id_petugas=<?= $data_petugas['id_petugas'] ?>"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-left mt-4">
            <a href="tambah_admin.php" class="btn btn-danger">tambah petugas</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>