<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ubah Petugas</title>
    
</head>

<body>
    <?php
    include "koneksi.php";
    $qry_get_petugas = mysqli_query($conn, "select * from petugas where id_petugas = '" . $_GET['id_petugas'] . "'");
    $dt_petugas = mysqli_fetch_array($qry_get_petugas);
    ?>
    <h3>Ubah Petugas</h3>
    <form action="proses_ubah_admin.php" method="post">
        <input type="hidden" name="id_petugas" value="<?= $dt_petugas['id_petugas'] ?>" />
        Nama petugas:
        <input type="text" name="nama_petugas" value="<?= $dt_petugas['nama_petugas'] ?>" class="form-control">
        Username :
        <input type="text" name="username" value="<?= $dt_petugas['username'] ?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        Level :
        <?php
        $arr_level = array('Admin' => 'Admin', 'Petugas' => 'Petugas');
        ?>
        <select name="level" class="form-control">
            <option>Pilih Level Anda</option>
            <?php foreach ($arr_level as $key_level => $val_level):
                if ($key_level == $dt_petugas['level']) {
                    $selek = "selected";
                } else {
                    $selek = "";
                }
                ?>
                <option value="<?= $key_level ?>" <?= $selek ?>><?= $val_level ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <input type="submit" name="simpan" value="Ubah Petugas" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>