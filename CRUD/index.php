<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Database Sony Kamera</h1>
    <div class="container card mt-5">
        <div class="card-body ">
            <a href="tambah.php" Class="btn btn-primary mt-3 mb-3">Tambah Data</a>
            <table class="table" id="example">
                <thead>
                    <tr class="text-center">
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Foto</th>
                        <th style="text-align: center;">Kategori</th>
                        <th style="text-align: center;">Kamera</th>
                        <th style="text-align: center;">Supplier</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include_once("connect.php");

                    $query = "SELECT kamera.*, kategori.nama_kategori, supplier.nama_supplier, supplier.alamat, supplier.telepon FROM kamera
                      INNER JOIN kategori ON kamera.id_kategori = kategori.id_kategori
                      INNER JOIN supplier ON kamera.id_supplier = supplier.id_supplier";
          
                    $products = mysqli_query($conn, $query);


                    while ($kmr = mysqli_fetch_array($products)) {
                        ?>

                        <tr>
                            <td style="text-align: center;"><?php echo $no; ?></td>
                            <td style="text-align: center;"><img src="images/<?php echo $kmr['foto']; ?>" width="150" height="150"></td>
                            <td style="text-align: center;"><?php echo $kmr['nama_kategori'] ?></td>
                            <td style="text-align: center;"><?php echo $kmr['nama_kamera'] ?></td>
                            <td style="text-align: center;"><?php echo $kmr['nama_supplier'] ?><br><?php echo $kmr['alamat'] ?><br>Phone : <?php echo $kmr['telepon'] ?></td>
                            <td style="text-align: center;"><?php echo $kmr['harga'] ?></td>
                            <td style="text-align: center;">
                                <a href="edit.php?id_kamera=<?php echo $kmr['id_kamera']; ?>" class="btn btn-dark">Edit</a>
                                <a href="delete.php?id_kamera=<?php echo $kmr['id_kamera']; ?>" class="btn btn-danger" onclick="confirm('Apakah Anda Yakin Mau Dihapus ?')">Delete</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>