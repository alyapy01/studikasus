<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products - E-commerce Website</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="cssproducts.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SONY CAMERA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CRUD/index.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="container">
    <header class="jumbotron text-center">
      <h1>Our Products</h1>
    </header>

    <table class="table product-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Supplier</th>
          <th>Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
        include_once("koneksi.php");

        $query = "SELECT kamera.*, kategori.nama_kategori, supplier.nama_supplier, supplier.alamat, supplier.telepon FROM kamera
          INNER JOIN kategori ON kamera.id_kategori = kategori.id_kategori
          INNER JOIN supplier ON kamera.id_supplier = supplier.id_supplier";

        $products = mysqli_query($conn, $query);

        while ($kmr = mysqli_fetch_array($products)) {
      ?>
        <tr>
        <td>
        <img src="CRUD/images/<?php echo $kmr['foto']; ?>" class="product-image"/>
        <h5><?php echo $kmr['nama_kamera']; ?></h5>
        <p>Kategori: <?php echo $kmr['nama_kategori']; ?></p>
     </td>
     <td>
         <?php echo $kmr['nama_supplier']; ?><br>
        <?php echo $kmr['alamat']; ?><br>
        Phone: <?php echo $kmr['telepon']; ?>
    </td>
    <td><?php echo $kmr['harga']; ?></td>
    <td><a href="#" class="btn btn-primary">Buy Now</a></td>
    </tr>
    <?php
    }
    ?>
      </tbody>
    </table>
  </section>

  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>Unleash Your Creativity with Our Cameras</p>
        </div>
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Contact Us</h5>
          <ul class="list-unstyled">
            <li>Jl. Jend. Sudirman No.28 Jakarta Jl. Jend. Sudirman No.28 Jakarta 10210 Indonesia</li>
            <li>Phone: +62-21-29498788</li>
            <li>Email: Sonycamera@gmail.com</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-center">&copy; 2023 SonyCamera. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
