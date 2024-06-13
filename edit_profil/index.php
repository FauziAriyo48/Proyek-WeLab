<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
// Mulai sesi
session_start();

// Periksa apakah nama lengkap ada dalam sesi
if (isset($_SESSION['nama_lengkap'])) {
    $nama_Lengkap = $_SESSION['nama_Lengkap'];
} else {
    $nama_lengkap = "Guest"; // Jika tidak ada, tetapkan nilai default
}
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?php echo $_SESSION['nama_Lengkap'] ?? ''; ?></span>
                <span class="text-black-50"><?php echo $_SESSION['email'] ?? ''; ?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Nama Lengkap</label><input type="text" class="form-control" name="nama_lengkap" placeholder="first name" value="<?php echo $_SESSION['nama_lengkap'] ?? ''; ?>"></div>
                        <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" name="nama_lengkap" placeholder="first name" value=""></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $_SESSION['email'] ?? ''; ?>"></div>
                        <div class="col-md-12"><label class="labels">Nim</label><input type="number" class="form-control" name="nim" placeholder="NIM" value=""></div>
                        <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" name="nim" placeholder="NIM" value=""></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="save_profile">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
