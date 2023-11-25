<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Tambah Produk</title>
</head>

<body>
    <?php
    include_once("connect.php");
    $array_kategori = mysqli_query($conn, "SELECT * FROM kategori");
    $array_supplier = mysqli_query($conn, "SELECT * FROM supplier");
    ?>

    <div class="row justify-content-center">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">Tambahkan Daftar Kamera</div>
                <div class="card-body">
                    <form action="tambah.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Kamera</label>
                            <input type="text" class="form-control" required="required" name="nama_kamera">
                        </div>
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" class="form-control" required="required" name="nama_supplier">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" required="required" name="alamat">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" required="required" name="telepon">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                                <?php
                                while ($kategori = mysqli_fetch_array($array_kategori)) {
                                    echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" required="required" name="harga">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" required="required" name="foto">
                        </div>
                        <input type="submit" class="form-control btn btn-dark float-right" name="Submit" value="TAMBAH">
                        <button type="reset" class="form-control btn btn-warning float-right mt-2">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['Submit'])) {
    $nama_kamera = $_POST['nama_kamera'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    //menentukan lokasi file akan dipindahkan
    $upload = "images/" . $foto;

    //pindahkan file
    if (move_uploaded_file($tmp_file, $upload)) {
        // Insert data into 'supplier' table
        $insertSupplier = mysqli_query($conn, "INSERT INTO `supplier` (`nama_supplier`, `alamat`, `telepon`) 
                            VALUES ('$nama_supplier', '$alamat', '$telepon')");

        if ($insertSupplier) {
            $lastSupplierID = mysqli_insert_id($conn);

            // Insert data into 'kamera' table
            $insertKamera = mysqli_query($conn, "INSERT INTO `kamera` (`nama_kamera`, `id_kategori`, `harga`, `foto`, `id_supplier`) 
                            VALUES ('$nama_kamera', '$id_kategori', '$harga', '$foto', '$lastSupplierID')");

            if ($insertKamera) {
                // Redirect to index.php if successful
                header("location:index.php");
                exit();
            } else {
                // If the insertion into the `kamera` table failed
                echo "Maaf, terjadi kesalahan saat menyimpan ke database (kamera).";
            }
        } else {
            // If the insertion into the `supplier` table failed
            echo "Maaf, terjadi kesalahan saat menyimpan ke database (supplier).";
        }
    } else {
        // If the file upload failed
        echo "Maaf, gambar gagal diupload.";
    }
}
?>
