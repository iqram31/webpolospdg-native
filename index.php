<?php
include "admin/koneksi.php";
include "admin/proses.php";

$link=koneksi_db();
$sql="SELECT * FROM profil WHERE id='profile'";
$res=mysqli_query($link,$sql);
$data=mysqli_fetch_array($res);

$sql2="SELECT * FROM produk";
$res2=mysqli_query($link,$sql2);

$sql3="SELECT * FROM kategori";
$res3=mysqli_query($link,$sql3);

if (isset($_POST['kirim_pesan'])) {
  kirim_pesan();
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>polospdg.co</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="admin/img/fav.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-play fa-rotate-270"></i> polospdg.co </a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#page-top" class="page-scroll">Home</a></li>
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="#portfolio" class="page-scroll">Product</a></li>
        <li><a href="#contact" class="page-scroll">Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header id="header">
  <div class="intro" style="background: url(admin/img/<?php echo $data['foto_dashboard'] ?>) no-repeat center bottom;">
    <div class="container">
      <div class="row">
        <div class="intro-text">
          <h1>PolosPdg.co</h1>
          <p>Premium Kaos Polos</p>
          <a href="#about" class="btn btn-custom btn-lg page-scroll">Kepoin Yuk!</a> </div>
      </div>
    </div>
  </div>
</header>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="section-title text-center center">
      <h2>About Us</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="admin/img/<?php echo $data['foto_icon'] ?>" class="img-responsive" alt=""/> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
            <?php echo $data['tentang']; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
  <div class="container">
    <div class="section-title text-center center">
      <h2>Our Product</h2>
      <hr>
    </div>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a href="#" data-filter="*" class="active">All</a></li>
            <?php
            while ($data3=mysqli_fetch_array($res3)) {
              $kat=str_replace(' ','', $data3['kategori']);
              echo "<li><a href='#' data-filter='.".$kat."'>".$data3['kategori']."</a></li>";
            }
            ?>
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <?php while ($data2=mysqli_fetch_array($res2)) {
            $kat=str_replace(' ','', $data2['kategori']);
        ?>
        <!-- foto section -->
        <div class="col-sm-6 col-md-3 col-lg-3 <?php echo $kat ?>">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="admin/img/produk/<?php echo $data2['link'] ?>" title="<?php echo $data2['nama'] ?>" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4><?php echo $data2['nama'] ?></h4>
              </div>
              <img src="admin/img/produk/<?php echo $data2['link'] ?>" class="img-responsive" alt="<?php echo $data2['nama'] ?>"> </a> </div>
          </div>
        </div>
      <?php
      }
       ?>
        <!-- /foto section -->
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Kesan dan Pesan</h2>
      <hr>
    </div>
    <div class="col-md-8 col-md-offset-2">
    <form class=""  method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="nama" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="pesan" class="form-control" rows="4" placeholder="Message" required="required"></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" name="kirim_pesan" class="btn btn-default btn-lg">Send Message</button>
      </form>
      <div class="social">
        <h3><b>Follow Instagram : </b></h3>
        <ul>
          <li><a href="https://www.instagram.com/polospdg.co" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2017 PolosPdg.co | Designed by <a target="_blank" href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/nivo-lightbox.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
