<?php
include "koneksi.php";
session_start();
if((!empty($_SESSION['username']) != "") && (!empty($_SESSION['password']) != "")){
  header('location:profil_web.php');
}else{
  include "proses.php";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Admin PolosPdg | Login</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
  <?php
  if (isset($_POST['login'])) {
    login();
  }
 ?>
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Log In</h6>
                      <form class="" action="" method="post">
                        <input class="form-control" type="text" placeholder="Username" name="username">
  			                <input class="form-control" type="password" placeholder="Password" name="password">
  			                <div class="action">
  			                    <button type="submit" name="login" class="btn btn-primary signup">Login</button>
  			                </div>
                      </form>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
<?php
  }
 ?>
