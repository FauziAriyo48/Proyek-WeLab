
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
        <h1 class="display-6">Pmesanan</h1>
    </header>
</div>
<section class="container my-2 bg-dark w-50 text-light p-2">
    <form class="row g-3 p-3" action="proses.php" method="post">
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="validationDefault01" name="nama_Lengkap" value="Mark" required>
        </div>
        <?php
// Koneksi ke MySQL
$conn = mysqli_connect("localhost", "root", "", "pemin_alat");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data barang
$query = "SELECT id_brg, nama_brg FROM barang";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Mulai form
    echo '<form class="row g-3 p-3" action="proses.php" method="post">';

    // Buat elemen select dan input number untuk Alat 1
    echo '<div class="col-md-6">';
    echo '<label for="inputJob1" class="form-label">Alat 1</label>';
    echo '<select id="inputJob1" class="form-select" name="alat1">';
    echo '<option selected>Choose...</option>';

    // Tambahkan opsi dari hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id_brg'] . '">' . $row['nama_brg'] . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<label for="inputJob1Qty" class="form-label">Quantity</label>';
    echo '<input type="number" class="form-control" id="inputJob1Qty" name="alat1Qty" required>';
    echo '</div>';

    // Mengembalikan kursor ke posisi awal
    mysqli_data_seek($result, 0);

    // Buat elemen select dan input number untuk Alat 2 (sama seperti langkah di atas)
    echo '<div class="col-md-6">';
    echo '<label for="inputJob2" class="form-label">Alat 2</label>';
    echo '<select id="inputJob2" class="form-select" name="alat2">';
    echo '<option selected>Choose...</option>';

    // Tambahkan opsi dari hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id_brg'] . '">' . $row['nama_brg'] . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<label for="inputJob2Qty" class="form-label">Quantity</label>';
    echo '<input type="number" class="form-control" id="inputJob2Qty" name="alat2Qty" required>';
    echo '</div>';

    // Tombol Submit
    echo '<div class="col-12">';
    echo '<button type="submit" class="btn btn-primary">Next</button>';
    echo '</div>';

    // Selesai form
    echo '</form>';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>


        <div class="col-12">
            <button type="submit" action="pesan.php" class="btn btn-primary">Next</button>
        </div>
    </form>
</section>
</body>
</html>
