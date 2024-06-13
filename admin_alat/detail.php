<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center"> <!-- Menggunakan kelas text-center di sini -->
                <h2>FORMULIR BON ALAT</h2>
            </div>
        </div>

        <?php
        // Memeriksa jika id_transaksi tersedia dalam URL
        if (isset($_GET['id_transaksi'])) {
            $id_transaksi = $_GET['id_transaksi'];
            $conn = mysqli_connect("localhost", "root", "", "pemin_alat");

            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            $sql = "SELECT DISTINCT a.nama_Lengkap, a.id, b.Prodi, c.kelas, g.percobaan, d.semester, e.tgl_pinjam, e.id_transaksi, f.nama_brg, i.qty
                    FROM detail_transaksi i
                    INNER JOIN admin a ON a.id = i.id
                    INNER JOIN prodi b ON b.id_prodi = i.id_prodi
                    INNER JOIN kelas c ON c.id_kelas = i.id_kelas
                    INNER JOIN semester d ON d.id_smt = i.id_smt
                    INNER JOIN tabel_transaksi e ON e.id_transaksi = i.id_transaksi
                    INNER JOIN barang f ON f.id_brg = i.id_brg
                    INNER JOIN percobaan g ON g.id_job = i.id_job
                    WHERE i.id_transaksi = ?";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id_transaksi);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                // Fetch satu baris untuk informasi nama, nim, dll.
                $row_info = mysqli_fetch_assoc($result);
                
                // Tampilkan informasi nama, nim, dll. di luar perulangan foreach
                echo '<div class="row">';
                echo '<div class="col-md-6"><p>Nama : ' . $row_info['nama_Lengkap'] . '</p></div>';
                echo '<div class="col-md-6"><p>Nim : ' . $row_info['id'] . '</p></div>';
                echo '</div>';

                echo '<div class="row">';
                echo '<div class="col-md-6"><p>Percobaan/Job : ' . $row_info['percobaan'] . '</p></div>';
                echo '<div class="col-md-6"><p>Prodi : ' . $row_info['Prodi'] . '</p></div>';
                echo '</div>';

                echo '<div class="row">';
                echo '<div class="col-md-6"><p>Kelas : ' . $row_info['kelas'] . '</p></div>';
                echo '<div class="col-md-6"><p>Semester : ' . $row_info['semester'] . '</p></div>';
                echo '</div>';

                echo '<div class="row">';
                echo '<div class="col-md-6"><p>Tanggal Dipinjam : ' . $row_info['tgl_pinjam'] . '</p></div>';
                echo '</div>';

                // Tampilkan tabel
                echo "<table class='table table-bordered text-center' id='myTable'>"; // Menambahkan kelas text-center di sini
                echo "<thead><tr><th>No</th><th>Nama Bahan</th><th>Jumlah</th></tr></thead><tbody>";
                $no = 1;

                // Tampilkan data dari tabel
                do {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row_info['nama_brg'] . "</td>";
                    echo "<td>" . $row_info['qty'] . "</td>";
                    echo "</tr>";
                } while ($row_info = mysqli_fetch_array($result));

                echo "</tbody></table>";

                mysqli_free_result($result);
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            echo "Parameter id_transaksi tidak tersedia dalam URL.";
        }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>
</html>
