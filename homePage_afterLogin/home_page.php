<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home page</title>

    <link rel="stylesheet" href="style_home.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12">
          <nav class="navbar fixed-top navbar-expand-md navbar-dark p-md-3">
              <div class="container">
                  <a class="navbar-brand" href="#">Welab</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <div class="mx-auto"></div>
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link active" href="#">Beranda</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBahan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Alat
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownBahan">
                                  <li><a class="dropdown-item" href="../List_alat/table.php">List Alat</a></li>
                                  <li><a class="dropdown-item" href="../form_alat/index.php">Pemesanan</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAlat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Bahan
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownAlat">
                                  <li><a class="dropdown-item" href="../List_bahan/table.php">List Bahan</a></li>
                                  <li><a class="dropdown-item" target="_blank" href="../form_bahan/index.php">Pemesanan</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAlat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Status Peminjaman
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownAlat">
                                  <li><a class="dropdown-item" href="../status_pemesanan_bahan/index.php">Bahan</a></li>
                                  <li><a class="dropdown-item" href="#">Alat</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownAlat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="../gambar/profil1.png" alt="Profile" class="profile-image" style="width: 25px;">
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                                  <li><a class="dropdown-item" href="../edit_profil/index.php">Edit Profil</a></li>
                                  <li><a class="dropdown-item" href="../homePage/home_page.php">Log Out</a></li>
                              </ul>
                          </li>
                  </div>
              </div>
          </nav>
      </div>
  </div>
  
        
        <!-- Carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="d-block w-100 equal-image" src="../gambar/Rektorat-POLNES-FIX.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100 equal-image" src="https://sehatnegeriku.kemkes.go.id/wp-content/uploads/2023/04/IMG-20230406-WA0013.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100 equal-image" src="https://www.gsi.id/images/content/phpbc3_mp_resized.jpg" alt="Third slide">
              </div>
          </div>
          <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
          </ol>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </a>
      </div>
  </div>
</div>



    <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 text">
        <h2 class="we">WHAT WE DO</h2>
        <p class="what">
          we actively engage in experiments, analyses, and collaborations to
          explore scientific phenomena and develop innovative solutions. With
          our available facilities and equipment, we strive to make positive
          contributions to research and scientific advancements.
        </p>

        <div class="divider"></div>
        
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-12 col-md-6">
        <img class="alat" src="../gambar/undraw_medical_research_qg4d 1.png">
      </div>
      <div class="col-12 col-sm-12 col-md-6">
        <h3>
          Alat yang kami miliki
        </h3>
        <p>
          qwwwwwwwwwwwwwwwwwwwwww
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-12 col-md-6">Peminjaman Bahan</div>
      <div class="col-12 col-sm-12 col-md-6">
        <img class ="bahan" src="../gambar/undraw_science_re_mnnr 1.png">
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12">
        <h2>
            Jenis - Jenis Laboratorium
        </h6>
        <p>

        </p>
      </div>
    </div>

    <div class="row lab">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <img class="card-img-top" src="../gambar/otk.jpeg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <img class="card-img-top" src="../gambar/otk.jpeg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4">
        <div class="card">
          <img class="card-img-top" src="../gambar/otk.jpeg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-12 col-sm-12 col-md-6">Logo polnes</div>
      <div class="col-12 col-sm-12 col-md-6">Logo tekim</div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.64500594237!2d117.12232787363034!3d-0.5340475994607224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67e2db3e32bbf%3A0x544143cceab5a638!2sTeknik%20Kimia%20POLNES!5e0!3m2!1sid!2sid!4v1710066441321!5m2!1sid!2sid" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-md-6 col-sm-12">
        <h1 class="where">Where Is Our Lab</h1>
        <img class ="maps" src="../gambar/undraw_map_re_60yf 1.png">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6">Alamat</div>
      <div class="col-md-6 col-sm-6">Social media</div>
    </div>
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      window.addEventListener("scroll", function () {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
          // Jika jarak scroll lebih dari 50px
          navbar.classList.add("bg-scroll"); // Tambahkan kelas bg-scroll
        } else {
          navbar.classList.remove("bg-scroll"); // Hapus kelas bg-scroll
        }
      });     
    </script>
<script>
  window.addEventListener('scroll', function() {
    const logButton = document.querySelector('.log');
    if (window.scrollY > 50) {
      logButton.classList.add('scrolled');
    } else {
      logButton.classList.remove('scrolled');
    }
  });
</script>
  </body>
</html>
