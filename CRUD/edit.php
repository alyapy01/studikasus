<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Edit Produk</title>
</head>

<body>
    <?php
    ob_start();
    include_once("connect.php");

    $array_kategori = mysqli_query($conn, "SELECT * FROM kategori");

    $id_kamera = $_GET['id_kamera'];
    $query = "SELECT kamera.*, kategori.nama_kategori, supplier.nama_supplier, supplier.alamat, supplier.telepon FROM kamera
    INNER JOIN kategori ON kamera.id_kategori = kategori.id_kategori
    INNER JOIN supplier ON kamera.id_supplier = supplier.id_supplier
    WHERE kamera.id_kamera = $id_kamera";

    $daftarproducts = mysqli_query($conn, $query);

    while ($dataproduct = mysqli_fetch_array($daftarproducts)) {
        $foto = $dataproduct['foto'];
        $id_kategori = $dataproduct['id_kategori'];
        $nama_kamera = $dataproduct['nama_kamera'];
        $nama_supplier = $dataproduct['nama_supplier'];
        $alamat = $dataproduct['alamat'];
        $telepon = $dataproduct['telepon'];
        $harga = $dataproduct['harga'];
    }
    ?>

    <div class="container-fluid">
        <br>
        <div class="row justify-content-center">
            <div class="col col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">Edit Data Kamera</div>

                    <div class="card-body">
                        <form action="edit.php?id_kamera=<?php echo $id_kamera; ?>" method="post" name="form1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kamera</label>
                                <input type="text" class="form-control" required="required" name="nama_kamera" value="<?php echo $nama_kamera; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" class="form-control" required="required" name="nama_supplier" value="<?php echo $nama_supplier; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" required="required" name="alamat" value="<?php echo $alamat; ?>">
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" required="required" name="telepon" value="<?php echo $telepon; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control">
                                    <?php
                                    while ($kategori = mysqli_fetch_array($array_kategori)) {
                                        $selected = ($kategori['id_kategori'] == $id_kategori) ? 'selected' : ''; // Tambahkan kondisi untuk menandai opsi terpilih
                                        echo "<option value='" . $kategori['id_kategori'] . "' " . $selected . ">" . $kategori['nama_kategori'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" required="required" name="harga" value="<?php echo $harga; ?>">
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" required="required" name="foto" value="<?php echo $foto; ?>"><br>
                            </div>
                            <input type="submit" class="form-control btn btn-dark float-right" name="Submit" value="TAMBAH">
                            <button type="reset" class="form-control btn btn-warning  float-right mt-2">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['Submit'])) {
    $id_kamera = $_GET['id_kamera'];
    $nama_kamera = $_POST['nama_kamera'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];

    $query = "UPDATE kamera
    INNER JOIN kategori ON kamera.id_kategori = kategori.id_kategori
    INNER JOIN supplier ON kamera.id_supplier = supplier.id_supplier
    SET kamera.nama_kamera = '$nama_kamera' , supplier.nama_supplier = '$nama_supplier', supplier.alamat = '$alamat', supplier.telepon = '$telepon', kamera.id_kategori = '$id_kategori', kamera.harga = '$harga' ,  kamera.foto = '$foto' WHERE kamera.id_kamera = '$id_kamera';";

    $update = mysqli_query($conn, $query);

    header("location:index.php");
}
?>
