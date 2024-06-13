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
    $alat1 = $_POST['alat1'] ?? '';
    $alat2 = $_POST['alat2'] ?? '';
    $qty1 = $_POST['qty1'] ?? '';
    $qty2 = $_POST['qty2'] ?? '';
    $tgl_pinjam = $_POST['tgl_pinjam'] ?? '';

    // Periksa apakah semua data yang dibutuhkan sudah ada
    if (empty($username) || empty($prodi) || empty($semester) || empty($kelas) || empty($laboratorium) || empty($percobaanJob) || empty($alat1) || empty($qty1) || empty($alat2) || empty($qty2) || empty($tgl_pinjam)) {
        die("Error: Data tidak lengkap.");
    }

    try {
        // Mulai transaksi
        $pdo->beginTransaction();

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

        // Insert alat1
        $stmt->execute([
            ':id_transaksi' => $id_transaksi,
            ':id' => $id_admin,
            ':id_prodi' => $prodi,
            ':id_smt' => $semester,
            ':id_kelas' => $kelas,
            ':id_lab' => $laboratorium,
            ':id_job' => $percobaanJob,
            ':id_brg' => $alat1,
            ':qty' => $qty1,
            ':status' => 1 // Nilai default untuk kolom status
        ]);

        // Insert alat2
        $stmt->execute([
            ':id_transaksi' => $id_transaksi,
            ':id' => $id_admin,
            ':id_prodi' => $prodi,
            ':id_smt' => $semester,
            ':id_kelas' => $kelas,
            ':id_lab' => $laboratorium,
            ':id_job' => $percobaanJob,
            ':id_brg' => $alat2,
            ':qty' => $qty2,
            ':status' => 1 // Nilai default untuk kolom status
        ]);

        // Commit transaksi
        $pdo->commit();

        echo "Data berhasil dimasukkan ke tabel_transaksi dan detail_transaksi.";
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi error
        $pdo->rollBack();
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>

