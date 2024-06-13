<?php
// update_status.php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "pemin_alat");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['transaksiId'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    // Update the status and add the description
    $sql = "UPDATE detail_transaksi SET status = 2, keterangan = '$description' WHERE id_transaksi = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
