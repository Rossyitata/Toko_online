<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>tambah produk</title>

</head>

<body>
    <div class="container">
        <h3 class="text-center my-4">Tambah produk</h3>
        <div class="form-container">
            <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga:</label>
                    <input type="text" id="harga" name="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="asset" class="form-label">Foto Produk:</label>
                    <input type="file" id="asset" name="foto_produk" class="form-control">
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>