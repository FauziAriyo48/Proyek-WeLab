<?php
    session_start();
    // Contoh: Setel session username untuk pengujian
    // $_SESSION['username'] = 'testuser';

    // Fungsi untuk mengambil daftar ID bahan yang sudah dipilih
function getSelectedIds() {
    // Periksa apakah session bahan dipilih sudah ada, jika tidak, kembalikan array kosong
    if(isset($_SESSION['selected_bahan'])) {
        return $_SESSION['selected_bahan'];
    } else {
        return [];
    }
}

// Tambahkan bahan yang baru dipilih ke dalam session
if(isset($_POST['bahan1'])) {
    $selected_bahan = getSelectedIds();
    $selected_bahan[] = $_POST['bahan1'];
    $_SESSION['selected_bahan'] = $selected_bahan;
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Form Design</title>
</head>
<body>
<div class="container-fluid bg-dark text-light py-3">
    <header class="text-center">
        <h1 class="display-6">Isi data pemesanan</h1>
    </header>
</div>
<section class="container my-2 bg-dark w-50 text-light p-2">
    <form class="row g-3 p-3" action="proses.php" method="post">
        <div class="col-md-8">
            <label for="validationDefault01" class="form-label">Nama Lengkap</label>
            <?php
            if(isset($_SESSION['username'])) {
                $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                $username = $_SESSION['username'];
                $query_nama = "SELECT nama_Lengkap FROM admin WHERE username = '$username'";
                $result_nama = mysqli_query($conn, $query_nama);

                if ($result_nama && mysqli_num_rows($result_nama) > 0) {
                    $row_nama = mysqli_fetch_assoc($result_nama);
                    $nama_lengkap = $row_nama['nama_Lengkap'];
                } else {
                    $nama_lengkap = '';
                }

                echo '<input type="text" class="form-control" id="validationDefaultnama" value="' . $nama_lengkap . '" name="nama_Lengkap" aria-describedby="inputGroupPrepend2" readonly required>';

                mysqli_close($conn);
            } else {
                echo '<p>Silakan login terlebih dahulu</p>';
            }
            ?>
        </div>

        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Username</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" id="validationDefaultUsername" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" name="username" aria-describedby="inputGroupPrepend2" readonly required>
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputProdi" class="form-label">Prodi</label>
            <select id="inputProdi" class="form-select" name="prodi" required>
                <option selected disabled value="">Choose...</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                $query = "SELECT id_prodi, prodi FROM prodi";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id_prodi'] . '">' . $row['prodi'] . '</option>';
                    }
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="inputSemester" class="form-label">Semester</label>
            <select id="inputSemester" class="form-select" name="semester" required>
                <option selected disabled value="">Choose...</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                $query = "SELECT id_smt, semester FROM semester";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id_smt'] . '">' . $row['semester'] . '</option>';
                    }
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="inputKelas" class="form-label">Kelas</label>
            <select id="inputKelas" class="form-select" name="kelas" required>
                <option selected disabled value="">Choose...</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                $query = "SELECT id_kelas, kelas FROM kelas";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id_kelas'] . '">' . $row['kelas'] . '</option>';
                    }
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputLab" class="form-label">Laboratorium</label>
            <select id="inputLab" class="form-select" name="laboratorium" required>
                <option selected disabled value="">Choose...</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                $query = "SELECT id_lab, laboratorium FROM lab";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id_lab'] . '">' . $row['laboratorium'] . '</option>';
                    }
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputJob" class="form-label">Percobaan/Job</label>
            <input type="text" class="form-control" id="inputJob" name="percobaanJob" required>
        </div>
        
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label">Tanggal Dipinjam</label>
            <input type="date" class="form-control" id="validationDefault01" name="tgl_pinjam" required>
        </div>

        <?php
        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "pemin_alat");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Query untuk mengambil daftar bahan
        $query = "SELECT id_brg, nama_brg FROM barang";
        $result = mysqli_query($conn, $query);

        

        if ($result) {
            for ($i = 1; $i <= 8; $i++) {
                echo '<div class="col-md-6">';
                echo '<label for="inputJob' . $i . '" class="form-label">Bahan ' . $i . '</label>';
                echo '<select id="inputJob' . $i . '" class="form-select" name="alat' . $i . '" required>';

                // Ambil daftar ID bahan yang sudah dipilih sebelumnya
                $selected_bahan = getSelectedIds();

                echo '<option selected disabled value="">Choose...</option>';
                // Loop melalui hasil query
               // Loop melalui hasil query
while ($row = mysqli_fetch_assoc($result)) {
    // Periksa apakah bahan sudah dipilih sebelumnya
    if(!in_array($row['id_brg'], $selected_bahan)) {
        echo '<option value="' . $row['id_brg'] . '">' . $row['nama_brg'] . '</option>';
    }
}

// Tambahkan opsi "Pilih..." dengan nilai kosong
echo '<option value="">Pilih...</option>';


                echo '</select>';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<label for="qty' . $i . '" class="form-label">Quantity</label>';
                echo '<input type="text" class="form-control" id="qty' . $i . '" name="qty' . $i . '">';
                echo '</div>';

                // Kembalikan pointer hasil query ke awal
                mysqli_data_seek($result, 0);
            }

            echo '<div class="col-12">';
            echo '<button type="submit" class="btn btn-primary">Submit</button>';
            echo '</div>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Tutup koneksi database
        mysqli_close($conn);
        ?>

<script>
    // Fungsi untuk memvalidasi formulir sebelum pengiriman
    function validateForm() {
        // Loop melalui setiap bahan yang dipilih
        for (var i = 1; i <= 8; i++) {
            // Periksa apakah bahan dipilih
            var bahan = document.getElementById('inputJob' + i);
            var quantity = document.getElementById('qty' + i);

            if (bahan.value !== '' && quantity.value === '') {
                alert('Quantity harus diisi untuk bahan yang dipilih.');
                return false;
            }
        }
        return true; // Form valid jika tidak ada bahan yang dipilih atau jika quantity diisi untuk setiap bahan yang dipilih
    }
</script>

    </form>
</section>

<script>
function validateForm() {
    // Validasi form
}
</script>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Pesanan berhasil terkirim.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
            $('#successModal').modal('show');
        <?php } ?>
    </script>
</body>
</html>
