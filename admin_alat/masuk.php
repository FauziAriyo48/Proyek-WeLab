<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Barang Masuk</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        table.dataTable {
            width: 100% !important;
        }

        table.dataTable th,
        table.dataTable td {
            white-space: nowrap;
        }

        .container-fluid {
            padding: 20px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">We Lab</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stock Barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Peminjaman Masuk
                        </a>
                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Sedang Digunakan
                        </a>
                        <a class="nav-link" href="dikembalikan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Belum dikembalikan
                        </a>
                        <a class="nav-link" href="logout.php">
                            Log Out
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Peminjaman Masuk</h1>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <h2 class="page-header"></h2>
                            <table id="tabelpeminjaman" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Prodi</th>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th>Tanggal Dipinjam</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    // Create connection
                                    $conn = mysqli_connect("localhost", "root", "", "pemin_alat");

                                    // Check connection
                                    if (!$conn) {
                                        die("Koneksi gagal: " . mysqli_connect_error());
                                    }

                                    $sql = "SELECT a.nama_Lengkap, b.Prodi, c.kelas, d.semester, e.tgl_pinjam, i.status, e.id_transaksi, f.nama_brg
                                            FROM detail_transaksi i
                                            INNER JOIN admin a ON a.id = i.id
                                            INNER JOIN prodi b ON b.id_prodi = i.id_prodi
                                            INNER JOIN kelas c ON c.id_kelas = i.id_kelas
                                            INNER JOIN semester d ON d.id_smt = i.id_smt
                                            INNER JOIN tabel_transaksi e ON e.id_transaksi = i.id_transaksi
                                            INNER JOIN barang f ON f.id_brg = i.id_brg
                                            WHERE i.status = 1
                                            ORDER BY e.id_transaksi";

                                    $query = $conn->query($sql);

                                    // Initialize the tracking variables
                                    $currentIdTransaksi = '';
                                    
                                    $no = 1;

                                    

                                    while ($row = mysqli_fetch_array($query)) {
                                        if ($currentIdTransaksi != $row['id_transaksi']) {
                                            if (!empty($items)) {
                                                // Output items for the previous group
                                                
                                            }

                                            $currentIdTransaksi = $row['id_transaksi'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_Lengkap']; ?></td>
                                            <td><?php echo $row['Prodi']; ?></td>
                                            <td><?php echo $row['kelas']; ?></td>
                                            <td><?php echo $row['semester']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['tgl_pinjam'])); ?></td>
                                            <td>
                                                <span class="btn btn-xs btn-<?php echo $row['status'] == 1 ? 'warning' : 'danger'; ?>">
                                                    <?php echo $row['status'] == 1 ? 'Menunggu' : 'belum dikembalikan'; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success view-button" onclick="window.location.href='detail.php?id_transaksi=<?php echo $row['id_transaksi']; ?>'">
                                                    View
                                                </button>
                                            </td>
                                            <td>
                                                <a href="#" onclick="openDescriptionModal(<?php echo $row['id_transaksi']; ?>)" class="btn btn-success">Accept</a>
                                                <a href="#" onclick="openRejectModal(<?php echo $row['id_transaksi']; ?>)" class="btn btn-danger">Reject</a>
                                            </td>

                                        </tr>
                                        <?php
                                        }

                                       
                                    }

                                    // Output items for the last group
                                    if (!empty($items)) {
                                        echo '<tr><td colspan="9"><strong>Items:</strong> ' . implode(', ', $items) . '</td></tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Detail Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded here -->
                    <div id="modalContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Keterangan Reject -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="rejectForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rejectReason">Reason for Reject</label>
                        <textarea class="form-control" id="rejectReason" name="rejectReason" rows="3" required></textarea>
                    </div>
                    <input type="hidden" id="transaksiIdReject" name="transaksiIdReject">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function openRejectModal(transaksiId) {
        $('#transaksiIdReject').val(transaksiId);
        $('#rejectModal').modal('show');
    }

    $(document).ready(function() {
        // Handle form submission for rejecting requests
        $('#rejectForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'reject_barang.php', // Sesuaikan dengan lokasi file PHP Anda
                data: formData,
                success: function(response) {
                    $('#rejectModal').modal('hide');
                    location.reload(); // Muat ulang halaman setelah permintaan ditolak
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>



    <!-- Add Description Modal -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Add Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="descriptionForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <input type="hidden" id="transaksiId" name="transaksiId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#tabelpeminjaman').DataTable({
                "autoWidth": true
            });
        });

        function openDescriptionModal(transaksiId) {
            $('#transaksiId').val(transaksiId);
            $('#descriptionModal').modal('show');
        }

        $('#descriptionForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'accept_barang.php',
                data: formData,
                success: function(response) {
                    $('#descriptionModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });

        // Handle form submission for rejecting requests
        $('#rejectForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'reject_barang.php', // Adjust the URL according to your server-side script
                data: formData,
                success: function(response) {
                    $('#rejectModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    </script>

<script>

        

</script>

   
</body>

</html>