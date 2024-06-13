<?php 
// Mengaktifkan session pada PHP
session_start();
 
// Menghubungkan PHP dengan koneksi database
$conn = mysqli_connect("localhost", "root", "", "pemin_alat");
 
// Menangkap data yang dikirim dari form login
$username_or_email = $_POST['username_or_email'];
$password = $_POST['password'];

// Menyeleksi data user dengan username atau email dan password yang sesuai
$login = mysqli_query($conn, "SELECT * FROM admin WHERE (username='$username_or_email' OR email='$username_or_email') AND password='$password'");
 
// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// Cek apakah username/email dan password ditemukan pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    // Cek jenis level user dan buat session sesuai dengan levelnya
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    // Alihkan ke halaman sesuai dengan level user
    switch ($data['level']) {
        case 'admin':
            header("location: ../weblab/index.php");
            break;
        case 'user':
            header("location: ../homePage_afterLogin/home_page.php");
            break;
        case 'pengurus':
            header("location: halaman_pengurus.php");
            break;
        default:
            // Jika level tidak sesuai, alihkan kembali ke halaman login
            header("location: index.php?pesan=gagal");
            break;
    }
} else {
    // Jika data tidak ditemukan, alihkan kembali ke halaman login
    header("location: index.php?pesan=gagal");
}
?>
