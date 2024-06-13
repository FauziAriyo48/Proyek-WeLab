<?php
// Periksa apakah parameter 'id' tersedia dalam URL
if(isset($_GET['id_transaksi'])) {
    // Dapatkan id_transaksi dari permintaan GET
    $id_transaksi = $_GET['id_transaksi'];

    // Buat koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "pemin_alat");

    // Periksa apakah koneksi berhasil
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Definisikan kueri SQL untuk mendapatkan detail barang
    $sql = "SELECT f.nama_brg
            FROM detail_transaksi i
            INNER JOIN barang f ON f.id_brg = i.id_brg
            INNER JOIN tabel_transaksi g ON g.id_transaksi = i.id_transaksi
            WHERE i.id_transaksi = $id_transaksi";

    // Eksekusi kueri SQL
    $result = $conn->query($sql);

    // Periksa apakah kueri berhasil dieksekusi
    if ($result) {
        // Inisialisasi array untuk menyimpan nama barang
        $barangs = [];

        // Ambil nama barang dari hasil kueri dan simpan dalam array
        while ($row = mysqli_fetch_assoc($result)) {
            $barangs[] = $row['nama_brg'];
        }

        // Output nama barang
        if (!empty($barangs)) {
            echo '<strong>Items:</strong> ' . implode(', ', $barangs);
        } else {
            echo 'Tidak ada barang ditemukan untuk id_transaksi: ' . $id_transaksi;
        }
    } else {
        echo 'Pengambilan data barang gagal.';
    }
} else {
    echo 'Parameter id tidak tersedia dalam URL.';
}
?>
