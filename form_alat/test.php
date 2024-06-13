<?php
$conn=mysqli_connect("localhost","root","","pemin_alat");


// Buat koneksi ke database


// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data barang dari database
$sql = "SELECT id_brg, nama_brg FROM barang";
$result = mysqli_query($conn, $sql);

// Periksa apakah ada hasil
if (mysqli_num_rows($result) > 0) {
    // Tampilkan data dalam dropdown menu
    echo '<select name="barang">';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row["nama_brg"] . '">' . $row["nama_brg"] . '</option>';
    }
    echo '</select>';
} else {
    echo "Tidak ada data barang dalam database";
}

// Tutup koneksi
mysqli_close($conn);
?>
