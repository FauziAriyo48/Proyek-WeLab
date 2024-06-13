<?php
// Pastikan hanya POST request yang diizinkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lakukan koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "pemin_alat");

    // Periksa koneksi
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Tangkap data yang dikirim dari form
    $id = $_POST['transaksiIdReject'] ?? '';
    $reason = mysqli_real_escape_string($conn, $_POST['rejectReason'] ?? '');

    // Update status dan tambahkan keterangan penolakan
    $sql = "UPDATE detail_transaksi SET status = 3, keterangan = ? WHERE id_transaksi = ?";
    
    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "si", $reason, $id);
    
    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Success";
    } else {
        // If error, provide a generic error message
        echo "Error: Unable to reject request.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);

    // Tutup koneksi
    mysqli_close($conn);
} else {
    // Jika bukan POST request, keluarkan pesan error
    echo "Method not allowed";
}
?>
