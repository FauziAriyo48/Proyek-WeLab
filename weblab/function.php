<?php

session_start();

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pemin_alat");

//menambahkan barang
if (isset($_POST['addnewbarang'])) {
    $nama_brg = $_POST['nama_brg'];
    $status = $_POST['status'];
    $stok_brg = $_POST['stok_brg'];

    $addtotable = mysqli_query($conn, "insert into barang (nama_brg,stok_brg,status) values('$nama_brg','$stok_brg','$status')");
    if ($addtotable) {
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

//menambahkan barang masuk

if (isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM barang WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang + $qty;

    $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (id_barang, keterangan, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock='$tambahkanstocksekarangdenganquantity' WHERE idbarang='$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
        header('location: masuk.php');
    } else {
        echo 'Gagal';
        header('location: masuk.php');
    }
}


//menambahkan barang keluar

if (isset($_POST['addbarangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang - $qty;

    $addtokeluar = mysqli_query($conn, "INSERT INTO keluar (id_barang, penerima, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock='$tambahkanstocksekarangdenganquantity' WHERE idbarang='$barangnya'");
    if ($addtokeluar && $updatestockmasuk) {
        header('location: keluar.php');
    } else {
        echo 'Gagal';
        header('location: keluar.php');
    }
}





//Update info barang
if (isset($_POST['updatebarang'])) {
    $idb = $_POST['idb'];
    $nama_brg = $_POST['nama_brg'];
    $status = $_POST['status'];

    $update = mysqli_query($conn, "UPDATE barang SET nama_brg='$nama_brg', status='$status' WHERE id_brg='$idb'");
    if ($update) {
        header('location: index.php');
    } else {
        echo 'Gagal';
        header('location: index.php');
    }
}



//Menghapus Barang dari stock

if (isset($_POST['hapusbarang'])) {
    $id_brg = $_POST['id_brg'];

    $hapus = mysqli_query($conn, "delete from barang where id_brg='$id_brg'");
    if ($hapus) {
        header('location: index.php');
    } else {
        echo 'Gagal';
        header('location: index.php');
    }
}





//Mengubah data barang masuk
if (isset($_POST['updatebarangmasuk'])) {
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "SELECT * FROM masuk WHERE id_masuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if ($qty > $qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE stock SET stock ='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty ='$qty', keterangan ='$deskripsi' where id_masuk='$idm'");
        if ($kurangistocknya && $updatenya) {
            header('location: masuk.php');
        } else {
            echo 'Gagal';
            header('location: masuk.php');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE stock SET stock ='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE masuk SET qty ='$qty', keterangan ='$deskripsi' WHERE id_masuk='$idm'");
        if ($kurangistocknya && $updatenya) {
            header('location: masuk.php');
        } else {
            echo 'Gagal';
            header('location: masuk.php');
        }
    }
}


//Menghapus Barang Masuk
if (isset($_POST['hapusbarangmasuk'])) {
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn, "select * from  stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok - $qty;

    $update = mysqli_query($conn, "update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "delete from masuk where id_masuk='$idm'");

    if ($update && $hapusdata) {
        header('location:masuk.php');
    } else {
        header('location:masuk.php');
    }
}



//Mengubah data barang keluar
if (isset($_POST['updatebarangkeluar'])) {
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "SELECT * FROM keluar WHERE id_keluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if ($qty > $qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE stock SET stock ='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update keluar set qty ='$qty', penerima ='$penerima' where id_keluar='$idk'");
        if ($kurangistocknya && $updatenya) {
            header('location: keluar.php');
        } else {
            echo 'Gagal';
            header('location: keluar.php');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE stock SET stock ='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE keluar SET qty ='$qty', penerima ='$penerima' WHERE id_keluar='$idk'");
        if ($kurangistocknya && $updatenya) {
            header('location: keluar.php');
        } else {
            echo 'Gagal';
            header('location: keluar.php');
        }
    }
}


//Menghapus Barang Keluar
if (isset($_POST['hapusbarangkeluar'])) {
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn, "select * from  stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok + $qty;

    $update = mysqli_query($conn, "update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "delete from keluar where id_keluar='$idk'");

    if ($update && $hapusdata) {
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    }
}
