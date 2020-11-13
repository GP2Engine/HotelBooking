<!DOCTYPE html>

<?php
	$login_button = '';
	include('config.php');

	if(!isset($_SESSION['access_token'])){ 
 
		$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
	}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon.png">

    <title>HotelBooking - Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="admin/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background: url('img/background.jpg') no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;">
    <h1 style="color:black; text-align:center;"><b>Welcome to the Hotel Booking Page</b></h1>
	<br></br>
	<div class="container" style="background-color: #230A59; max-width: 600px; margin: auto;">
	  
	  <br></br>
      <form class="form-signin" role="form" action="loginauth.php" method="post" style="padding-left:30%; text-align:center; width:70%;">
        <h2 class="form-signin-heading" style="color:white;">Sign in</h2>
        <label for="name" class="sr-only">Username</label>
        <input type="text" id="username" name="username"class="form-control" placeholder="Username" required autofocus>
        <label for="Password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color:#5C73F2">Sign in</button>
      </form>
	  <br></br>
	  
	  <form class="form-signin" role="form" action="register.php" method="post" style="padding-left:30%; text-align:center; width:70%;">
        <h2 class="form-signin-heading" style="color:white;">Sign up</h2>
        <label for="newusername" class="sr-only">Username</label>
        <input type="text" id="newusername" name="newusername"class="form-control" placeholder="Username" required autofocus>
        <label for="newpassword" class="sr-only">Password</label>
        <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="Password" required>
		<label for="cnewpassword" class="sr-only">Confirm Password</label>
        <input type="password" id="cnewpassword" name="cnewpassword" class="form-control" placeholder="Retype Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color:#5C73F2">Sign up</button>
      </form>
	  <br></br>
	  
	  <?php
		
		echo '<div align="center">'.$login_button . '</div>';
		
	  ?>
	  <br></br>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="admin/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
