<?php require_once('db-connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <link rel='stylesheet' id='responsive-lightbox-prettyphoto-css'  href='https://www.lammellab.org/wp-content/plugins/responsive-lightbox/assets/prettyphoto/css/prettyPhoto.min.css?ver=2.0.5' type='text/css' media='all' />
    <link rel='stylesheet' id='flexslick-css'  href='https://www.lammellab.org/wp-content/themes/lammell/css/flex-slick.css?ver=2.6.3' type='text/css' media='all' />
    <link rel='stylesheet' id='style-css'  href='https://www.lammellab.org/wp-content/themes/lammell/style.css?ver=4.9.6' type='text/css' media='all' />
    <script type='text/javascript' src='https://www.lammellab.org/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <link rel="stylesheet" href="style_kalender.css">

   
</head>

<body class="home page-template-default page page-id-2 hfeed">
<header class="site-header">
	<div class="fixed-header">
        <div class="navbar">
        	<div class="site-logo">
            	        <a class="home-logo" href="#"><img src="../gambar/LOGO_WEB_POLNES_fixed.png" class="attachment-full size-full" alt="" />
                                    				     
            </div>     
            <nav id="site-navigation" class="site-navigation">
                <a class="menu-toggle" aria-controls="primary-menu" aria-expanded="true">Navigate</a>
				<div class="menu-primary-navigation-container"><ul id="menu-primary-navigation" class="menu"><li id="menu-item-54" class="menu home"><a href="../homePage/home.html">Home</a><span class="menu-icon"></span></li>
                <li id="dasboard" class="dashboard"><a href="#">Dashboard</a><span class="menu-icon"></span></li>
                <li id="pemesanan" class="pemesanan"><a target = _blank href="../form/pemesanan.html">Pemesanan</a><span class="menu-icon"></span></li>
                <li id="jadwal" class="jadwal"><a href="index.php">Jadwal</a><span class="menu-icon"></span></li>
                </ul></div>            
            </nav> 
        </div><!-- .container -->    
    </div><!-- .fixed-header -->

    <!--calender-->
    <div class="container py-5" id="page-container">
    <div class="row justify-content-center"> <!-- Center the content horizontally -->
        <div class="col-md-9">
            <div id="calendar"></div>
        </div>
    </div>
</div>

    <!-- Event Details -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details -->

<?php 
$schedules = $conn->query("SELECT * FROM `jadwal`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['jam_awal']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['jam_akhir']));
    $sched_res[$row['id_jadwal']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>
<script type='text/javascript' src='https://www.lammellab.org/wp-content/plugins/responsive-lightbox/js/front.js?ver=2.0.5'></script>
<script type='text/javascript' src='https://www.lammellab.org/wp-content/themes/lammell/js/scrollreveal.min.js?ver=3.3.1'></script>
<script type='text/javascript' src='https://www.lammellab.org/wp-content/themes/lammell/js/slick.min.js?ver=1.6.0'></script>
<script type='text/javascript' src='https://www.lammellab.org/wp-content/themes/lammell/js/customizer.js?ver=20171118'></script>
<script type='text/javascript' src='https://www.lammellab.org/wp-includes/js/wp-embed.min.js?ver=4.9.6'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>