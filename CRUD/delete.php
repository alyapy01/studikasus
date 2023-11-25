<?php
include 'connect.php';

$id_kamera = $_GET['id_kamera'];

$query = "SELECT kamera.*, kategori.nama_kategori, supplier.nama_supplier, supplier.alamat, supplier.telepon 
          FROM kamera
          INNER JOIN kategori ON kamera.id_kategori = kategori.id_kategori
          INNER JOIN supplier ON kamera.id_supplier = supplier.id_supplier
          WHERE kamera.id_kamera = '$id_kamera'";

$daftarproducts = mysqli_query($conn, $query);

if ($dataproduct = mysqli_fetch_array($daftarproducts)) {
    $foto = $dataproduct['foto'];
    $id_kategori = $dataproduct['id_kategori'];
    $nama_kamera = $dataproduct['nama_kamera'];
    $nama_supplier = $dataproduct['nama_supplier'];
    $alamat = $dataproduct['alamat'];
    $telepon = $dataproduct['telepon'];
    $harga = $dataproduct['harga'];

    // Hapus data kamera
    $deleteQueryKamera = "DELETE FROM kamera WHERE id_kamera = '$id_kamera'";
    $deleteResultKamera = mysqli_query($conn, $deleteQueryKamera);

    // Hapus data supplier jika tidak ada kamera lain yang terhubung
    $countQuery = "SELECT COUNT(*) as total_kamera FROM kamera WHERE id_supplier = '".$dataproduct['id_supplier']."'";
    $countResult = mysqli_query($conn, $countQuery);
    $countData = mysqli_fetch_array($countResult);
    $totalKamera = $countData['total_kamera'];

    if ($totalKamera == 0) {
        $deleteQuerySupplier = "DELETE FROM supplier WHERE id_supplier = '".$dataproduct['id_supplier']."'";
        $deleteResultSupplier = mysqli_query($conn, $deleteQuerySupplier);
        // Hapus foto supplier jika diperlukan
        // ...
    }

    if ($deleteResultKamera && (!$totalKamera || $deleteResultSupplier)) {
        // Hapus foto kamera jika diperlukan
        // ...

        header("location:index.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "Data tidak ditemukan.";
}
?>
