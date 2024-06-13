<!DOCTYPE html>
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
                <h4 class="card-title">Login</h4>
                <?php 
                if(isset($_GET['pesan'])){
                  if($_GET['pesan']=="gagal"){
                    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                  }
                }
                ?>
 
                <form method="POST" action="cek_login.php" class="my-login-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      id="username_or_email"
                      type="text"
                      class="form-control"
                      name="username_or_email"
                      placeholder = "Masukan Username"
                      required
                      autofocus
                    />
                    <div class="invalid-feedback">Email is invalid</div>
                  </div>

                  <div class="form-group">
                    <label for="password">Password </label>

                    <input
                      id="password"
                      type="password"
                      class="form-control"
                      name="password"
                      placeholder = "Masukan Password"
                      required
                      data-eye
                    />
                  </div>

                

                  <div class="form-group m-0">
                    <button type="submit" class="btn btn-primary btn-block" name="login">
                      Login
                    </button>
                  </div>
                  
                  <div class="mt-4 text-center">
                    <a href="../Register/index.php">Don't have account?</a>
                  </div>
                  <div class="mt-4">
                    <a href="../homePage/home_page.php">Back</a> 
                  </div>
                </form>
              </div>
            </div>
            <div class="footer"></div>
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