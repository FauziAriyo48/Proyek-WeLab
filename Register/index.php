
 
 <html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Kodinger" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>My Login Page</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body class="my-login-page">
    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-md-center h-100">
          <div class="card-wrapper">
            <div class="card fat">
              <div class="card-body">
                <h4 class="card-title">Register Account</h4>
 
                <form method="POST" action="cek_register.php" class="my-login-validation" novalidate="">
                <div class="form-group">
                    <label for="email">email</label>
                    <input
                      id="email"
                      type="email"
                      class="form-control"
                      name="email"
                      value=""
                      required
                      autofocus
                    />
                    <div class="invalid-feedback">Email is invalid</div>
                  </div>

                  <div class="form-group">
                    <label for="username">username</label>
                    <input
                      id="username"
                      type="text"
                      class="form-control"
                      name="username"
                      value=""
                      required
                      autofocus
                    />
                    <div class="invalid-feedback">Email is invalid</div>
                  </div>
                  <div class="form-group">

                  <label for="nama_Lengkap">Nama Lengkap</label>
                  <input
                      id="nama_Lengkap"
                      type="text"
                      class="form-control"
                      name="nama_Lengkap"
                      value=""
                      required
                      autofocus
                  />
                  <div class="invalid-feedback">Nama Lengkap diperlukan</div>
              </div>

              <div class="form-group">
              <label for="nim">NIM</label>
              <input
                  id="nim"
                  type="text"
                  class="form-control"
                  name="nim"
                  value=""
                  required
                  autofocus
              />
              <div class="invalid-feedback">NIM diperlukan</div>
          </div>

                  <div class="form-group">
                    <label for="password">Password </label>

                    <input
                      id="password"
                      type="password"
                      class="form-control"
                      name="password"
                      required autofocus
                      data-eye
                    />
                    <div class="invalid-feedback">Password is required</div>
                  </div>

              

                  <?php
                      // Koneksi ke database
                      $host = 'localhost';
                      $db   = 'pemin_alat';
                      $user = 'root';
                      $pass = '';
                      $charset = 'utf8mb4';

                      $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                      $options = [
                          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                          PDO::ATTR_EMULATE_PREPARES   => false,
                      ];

                      try {
                          $pdo = new PDO($dsn, $user, $pass, $options);
                      } catch (\PDOException $e) {
                          throw new \PDOException($e->getMessage(), (int)$e->getCode());
                      }

                      // Query untuk mengambil nilai-nilai dari kolom 'level' dalam tabel 'admin'
                      $stmt = $pdo->prepare("SELECT DISTINCT level FROM admin");
                      $stmt->execute();
                      $levels = $stmt->fetchAll(PDO::FETCH_COLUMN);

                      // Menampilkan opsi dropdown
                      $current_user_level = "user"; // Contoh level pengguna yang sedang aktif

                      echo '<div class="form-group">';
                      echo '<label for="level">Level</label>';
                      echo '<select id="level" class="form-control" name="level" required>';
                      echo '<option value="user" selected>User</option>';
                      echo '</select>';
                      echo '</div>';
                    ?>

                  <div class="form-group m-0">
                    <button type="submit" class="btn btn-primary btn-block" name="Register">
                        Register
                    </button>
                  </div>
                  <div class="mt-4 text-center">
                    <a href="../login/index.php">Log In</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="footer">Copyright &copy; 2017 &mdash; Your Company</div>
          </div>
        </div>
      </div>
    </section>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
  const loginButton = document.getElementById('loginButton');
  const loginPopup = document.getElementById('loginPopup');
  const closeButton = document.querySelector('.close-button');

  // Tampilkan pop-up login saat tombol login diklik
  loginButton.addEventListener('click', function () {
    loginPopup.style.display = 'block';
  });

  // Sembunyikan pop-up login saat tombol close ditekan
  closeButton.addEventListener('click', function () {
    loginPopup.style.display = 'none';
  });
});

    </script>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="js/my-login.js"></script>
  </body>
</html>