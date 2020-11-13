<?php
	session_start();

	// is user logged in?
	include './auth.php';
	if(!isset($_SESSION['access_token'])){
		$re = mysqli_query($dbhandle, "select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
		echo mysqli_error($dbhandle);
		if(mysqli_num_rows($re) > 0)
		{

		} 
		else
		{
			session_destroy();
			header("location: index.php");
		}
	}
?>	

<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name="description" content="">
    <meta name="author" content="">
 

    <title>HotelBooking - Arrival State</title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/dashboard.css" rel="stylesheet">
	<link href="admin/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="js/ie-emulation-modes-warning.js"></script-->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<link href="admin/css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="admin/css/fontello.css">
    <link rel="stylesheet" href="admin/css/animation.css">
	<link rel="icon" href="img/icon.png">


 </head>
  
  <script>
  function fnSearch()
		{
			var email=document.getElementById('user-email').value;
			if (email.length > 0){
			$.ajax({
				type: 'POST',
				url: 'searchbook.php',
				data: 'user-email=' + email,
				success: function(resPonsE) 
					{
						document.getElementById('bookindetails').style.display='block'
						document.getElementById('bookinginfo').innerHTML=resPonsE;
			
					}
			});
			   }
		}	
  </script>
  

	<body style="background: url('img/background.jpg') no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;">
	<br></br>
		<div class="container" style="background-color: #230A59; max-width: 800px; margin: auto;">
		  <form class="form-signin" method="post" action="" style="padding-left:30%; text-align:center; width:70%;">
			<h2 class="form-signin-heading" style="color:white;">Arrival State</h2>
			<br>
			<label for="email" class="sr-only">Enter your email:</label>
			<input type="email" id="user-email" name="email"class="form-control" placeholder="user@example.gr" required autofocus>
			<input class="btn btn-lg btn-primary btn-block" id="search" name="search" value="Search" onClick="return fnSearch();" style="background-color:#5C73F2" type="button">
		  </form>
		  <br>
		  <form class="form-signin" action="" style="padding-left:30%; text-align:center; width:70%;">
		  <button class="btn btn-lg btn-primary btn-block" onclick="window.location.href='home.php';" style="background-color:#5C73F2" type="button">Back</button>
		  </form>
		  <br>
		  <form class="form-signin" name="form" action="signout.php" method="post" style="padding-left:30%; text-align:center; width:70%;">
			<button class="btn btn-lg btn-primary btn-block" type="submit" onClick="return fnSearch();" style="background-color:#5C73F2">Sign out</button>
		  </form>
		  <br></br>
		</div>
		
	<div class="container" style="background-color: #5C73F2; max-width: 800px; margin: auto;">
		<div class="row" id="bookindetails" style="display:none; ">
					<hr>        <div class="col-xs-12 "  >
							  
							  <div class="table-responsive">
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th>Booking No.</th>
									  <th>Check In</th>
									  <th>Check Out</th>
									  <th>Room</th>
									  <th>Guests</th>
									  <th>Total Amount</th>
									  <th>Deposit</th>
									  <th>Balance</th>
									  <th>Arrival Status</th>
									</tr>
								  </thead>
								  <tbody id="bookinginfo"  >
									
									
								   
								  </tbody>
								</table>
							  </div>
							</div>
				</div>
		</div>
		
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug >
    <script src="js/ie10-viewport-bug-workaround.js"></script-->
	</body>	  
</html>