<?php
session_start();

// Lakukan koneksi ke database
$host = 'localhost';
$db = 'pemin_alat';
$user = 'root';
$pass = '';
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data yang dikirim dari form
    $nama = $_POST['nama_Lengkap'] ?? '';
    $username = $_SESSION['username'] ?? '';
    $prodi = $_POST['prodi'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $laboratorium = $_POST['laboratorium'] ?? '';
    $percobaanJob = $_POST['percobaanJob'] ?? '';
    $tgl_pinjam = $_POST['tgl_pinjam'] ?? '';

    // Array untuk menyimpan data alat dan quantity
    $alat = [];
    $qty = [];
    for ($i = 1; $i <= 8; $i++) {
        $alat[] = $_POST["alat$i"] ?? '';
        $qty[] = $_POST["qty$i"] ?? '';
    }

    // Periksa apakah semua data yang dibutuhkan sudah ada
    if (empty($username) || empty($prodi) || empty($semester) || empty($kelas) || empty($laboratorium) || empty($percobaanJob) || empty($tgl_pinjam)) {
        die("Error: Data tidak lengkap.");
    }

    for ($i = 0; $i < 8; $i++) {
        if (!empty($alat[$i]) && empty($qty[$i])) {
            die("Error: Quantity untuk Alat " . ($i + 1) . " harus diisi.");
        }
    }

    try {
        // Mulai transaksi
        $pdo->beginTransaction();

        // Insert ke tabel percobaan
        $stmt = $pdo->prepare("INSERT INTO percobaan (percobaan) VALUES (:nama_percobaan)");
        $stmt->execute([':nama_percobaan' => $percobaanJob]);

        // Ambil ID terakhir yang diinsert
        $id_percobaan = $pdo->lastInsertId();

        // Insert ke tabel_transaksi
        $stmt = $pdo->prepare("INSERT INTO tabel_transaksi (tgl_pinjam) VALUES (:tgl_pinjam)");
        $stmt->execute([':tgl_pinjam' => $tgl_pinjam]);

        // Ambil ID terakhir yang diinsert
        $id_transaksi = $pdo->lastInsertId();

        // Ambil id dari tabel admin berdasarkan username
        $stmt = $pdo->prepare("SELECT id FROM admin WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$admin) {
            throw new Exception("User tidak ditemukan.");
        }
        $id_admin = $admin['id'];

        // Insert ke tabel detail_transaksi dengan ID dari tabel_transaksi
        $stmt = $pdo->prepare("INSERT INTO detail_transaksi (id_transaksi, id, id_prodi, id_smt, id_kelas, id_lab, id_job, id_brg, qty, status) 
                               VALUES (:id_transaksi, :id, :id_prodi, :id_smt, :id_kelas, :id_lab, :id_job, :id_brg, :qty, :status)");

        // Insert alat1 hingga alat8
        for ($i = 0; $i < 8; $i++) {
            if (!empty($alat[$i])) {
                $stmt->execute([
                    ':id_transaksi' => $id_transaksi,
                    ':id' => $id_admin,
                    ':id_prodi' => $prodi,
                    ':id_smt' => $semester,
                    ':id_kelas' => $kelas,
                    ':id_lab' => $laboratorium,
                    ':id_job' => $id_percobaan, // Gunakan ID percobaan yang baru saja diinsert
                    ':id_brg' => $alat[$i],
                    ':qty' => $qty[$i],
                    ':status' => 1 // Nilai default untuk kolom status
                ]);
            }
        }

        // Commit transaksi
        $pdo->commit();

        // Arahkan pengguna ke halaman success.php
        header("Location: index.php");
        exit(); // Pastikan tidak ada output lain sebelum fungsi header()
        
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi error
        $pdo->rollBack();
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}

?>
