<?php
if(isset($_GET['logout'])){
  logout();
}
?>
<!-- Header-->
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="#">Admin Dashboard</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">

	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="?logout">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
<!-- /Header-->

<!-- Menu -->
<div class="page-content">
  <div class="row">
  <div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
            <ul class="nav">
                <!-- Main menu -->
                <li><a href="profil_web.php"><i class="glyphicon glyphicon-home"></i> Profil Website</a></li>
                <li><a href="kategori_produk.php"><i class="glyphicon glyphicon-tasks"></i>Kategori Produk</a></li>
                <li><a href="daftar_produk.php"><i class="glyphicon glyphicon-tasks"></i>Daftar Produk</a></li>
                <li><a href="kesanpesan.php"><i class="glyphicon glyphicon-tasks"></i>Kesan dan Pesan</a></li>
            </ul>
         </div>
  </div>

<!-- /Menu -->
