<?php
// Koneksi ke database menggunakan mysqli
$conn = mysqli_connect("localhost", "root", "", "pemin_alat");

// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengekstrak nilai dari form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $nim = $_POST['nim'];
    $nama_Lengkap = $_POST['nama_Lengkap'];
    
    // Query untuk menyimpan data ke dalam tabel admin menggunakan mysqli
    $sql = "INSERT INTO admin (email, username, password, level, id, nama_Lengkap) VALUES ('$email', '$username', '$password', '$level', '$nim', '$nama_Lengkap')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman login dengan pesan sukses jika data berhasil disimpan
        header("location: ../login/index.php?pesan=registrasi_sukses");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
