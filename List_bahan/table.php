<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List Alat</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <style>
      table {
          margin-top: 30px;
          border-collapse: collapse;
          width: 100%;
      }
      th, td {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }
      th {
          background-color: gray;
      }
  </style>
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
                              <a class="nav-link" href="../homePage_afterLogin/home_page.php">Beranda</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBahan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Alat
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownBahan">
                                  <li><a class="dropdown-item" href="#">List Alat</a></li>
                                  <li><a class="dropdown-item" href="../form_bahan/index.php">Pemesanan</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownAlat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Bahan
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownAlat">
                                  <li><a class="dropdown-item active" href="../List_bahan/table.html">List Alat</a></li>
                                  <li><a class="dropdown-item" target="_blank" href="../form_bahan/index.html">Pemesanan</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAlat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Status Peminjaman
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownAlat">
                                  <li><a class="dropdown-item" href="../status_pemesanan_alat/index.php">Bahan</a></li>
                                  <li><a class="dropdown-item" href="#">Alat</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownAlat" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="../gambar/profil1.png" alt="Profile" class="profile-image" style="width: 25px;">
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                                  <li><a class="dropdown-item" href="#">Edit Profil</a></li>
                                  <li><a class="dropdown-item" href="../weblab/logout.php">Log Out</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
      </div>
  </div>
  <br><br><br>
  <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 text">
          <table>
              <thead>
                  <tr>
                      <th scope="col">NO</th>
                      <th scope="col">Nama Bahan</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Keterangan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  // Connect to MySQL
                  $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
                  
                  // Check connection
                  if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                  }
                  
                  // Query to fetch data from database
                  $sql = "SELECT * FROM barang";
                  $result = mysqli_query($conn, $sql);
                  
                  // Loop through each row in the result set
                  $no = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $no++ . "</td>";  // Display auto-incremented number
                      echo "<td>" . $row['nama_brg'] . "</td>";
                      echo "<td>" . $row['stok_brg'] . "</td>";
                      echo "<td>" . $row['status'] . "</td>";
                      echo "</tr>";
                  }
                  
                  // Close connection
                  mysqli_close($conn);
                  ?>
              </tbody>
          </table>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
