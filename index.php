<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Website</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .carousel-item img {
      width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SONY CAMERA<i class="fa fa-camera"></i></a>
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
      <h1>Best Offer</h1>
      <p>New Arrivals On Sale</p>
    </header>
  </section>
  

  <section class="container">
    <h2>Sony Camera</h2>
    <p style="text-align: justify;">
    Kamera Sony dikenal karena fitur-fitur berkualitas tinggi dan inovatifnya, sehingga populer di kalangan fotografer dan videografer di seluruh dunia. Kamera Sony adalah serangkaian produk kamera yang diproduksi oleh perusahaan teknologi terkenal, Sony Corporation. Kamera Sony telah menjadi pilihan yang populer dalam dunia fotografi, videografi, dan perfilman. Dalam fotografi, kamera Sony menawarkan sensor CMOS berkualitas tinggi yang menghasilkan gambar yang tajam dan detail. Mereka juga memiliki sistem lensa E-Mount yang kompatibel, memberikan fleksibilitas dalam memilih lensa berkualitas tinggi. Dalam videografi, kamera Sony menonjol dengan kemampuan merekam video resolusi tinggi, seperti 4K atau bahkan 8K, dengan fitur-fitur canggih seperti stabilisasi gambar dalam kamera. Dalam perfilman, kamera Sony sering digunakan dalam produksi film profesional, dengan kemampuan merekam video berkualitas tinggi dan pengaturan warna yang fleksibel. Dengan reputasi yang kuat dan inovasi terus-menerus, kamera Sony menjadi pilihan utama bagi para profesional dan hobiis dalam fotografi, videografi, dan perfilman.
    </p>
  </section>

  <section class="products">
    <div class="container">
      <h2>Our Products</h2>
      <div id="product-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
          include_once("koneksi.php");

          $query = "SELECT kamera.*, kategori.nama_kategori, supplier.nama_supplier, supplier.alamat, supplier.telepon FROM kamera
            INNER JOIN kategori ON kamera.id_kategori = kategori.id_kategori
            INNER JOIN supplier ON kamera.id_supplier = supplier.id_supplier";

          $products = mysqli_query($conn, $query);

          $counter = 0;
          $active = 'active';
          while ($kmr = mysqli_fetch_array($products)) {
            if ($counter % 3 === 0) {
              echo '<div class="carousel-item ' . $active . '"><div class="row">';
              $active = '';
            }
            echo '
              <div class="col-md-4">
                <div class="product-card">
                  <img src="CRUD/images/' . $kmr['foto'] . '" alt="Product">
                  <h3>' . $kmr['nama_kamera'] . '</h3>
                  <p>Kategori: ' . $kmr['nama_kategori'] . '</p>
                  ' . $kmr['nama_supplier'] . '<br>
                  ' . $kmr['alamat'] . '<br>
                  Phone: ' . $kmr['telepon'] . '<br><br>
                  <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
              </div>
            ';

            if ($counter % 3 === 2) {
              echo '</div></div>';
            }

            $counter++;
          }

          if ($counter % 3 !== 0) {
            echo '</div></div>';
          }
          ?>
        </div>
        <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#product-carousel').carousel();
    });
  </script>
</body>
</html>
