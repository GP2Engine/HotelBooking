<?php
session_start();

include('config.php');
	if(isset($_GET['code'])){
	
		$token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
		
		if(!isset($token['error'])){
			$google_client->setAccessToken($token['access_token']);
			$_SESSION['access_token'] = $token['access_token'];
			
			$google_service = new Google_Service_Oauth2($google_client);
			
			$data = $google_service->userinfo->get();
			
			if(!empty($data['given_name'])){
				$_SESSION['username'] = $data['given_name'];
			}
		}
	}

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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HotelBooking - Reservation</title>

<link rel="stylesheet" href="scss/normalize.css">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link rel="stylesheet" href="scss/datepicker.css">
<link href="scss/datepicker.css" rel="stylesheet" type="text/css"/>  
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
		$("#checkout").datepicker();
		$("#checkin").datepicker({
		minDate : new Date(),
		onSelect: function (dateText, inst) {
        var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
        $("#checkout").datepicker("option", "minDate", date);
		}
		});
  });
</script>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"><link rel="icon" href="img/icon.png"></head>
<body class="fontbody" style="background: url('img/background.jpg') no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;">
 
<div class="row foo" style="margin:30px auto 30px auto;"><br><br>

</div>

<div class="row" style="text-align:center; padding-top: 5%;padding-left: 23%;">
	<div class="large-4 columns blackblur fontcolor" style="width: 50%; padding-top:50px; text-align:center; background-color: #230A59;">
	
	<div class="large-12 columns " >
	<p><b>Booking Dates Availability</b></p>
			<form name="form" action="checkroom.php" method="post" onSubmit="return validateForm(this);">
			<div class="row">
				
					<div class="large-6 columns" style="max-width:100%;">
						<label class="fontcolor" for="checkin">Arrival Date
							<input name="checkin" id="checkin" style="width:100%;"/>
						</label>
					</div>
					
					<div class="large-6 columns" style="max-width:100%;">
						<label class="fontcolor" for="checkout">Departure Date
							<input name="checkout" id="checkout" style="width:100%;"/>
						</label>
					
					
					</div>
			</div>
					
			<div class="row">
				
					<div class="large-6 columns">
						<label class="fontcolor">Number of Adults
							
								<select  name="totaladults" id="totaladults" style="width:100%;">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								</select>
							
						</label>
					</div>
					
					<div class="large-6 columns"  style="max-width:100%;">
						<label class="fontcolor">Number of Kids
							<select  name="totalchildrens" id="totalchildrens" style="width:100%; color:black;">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							</select>
						</label>
					</div>
					
				
			</div>
			
			  <div class="row">
				<div class="large-12 columns" >
					<button name="submit" href="#" class="button small fontslabo" style="background-color:#5C73F2; width:100%;" >Submit</button>
				</div>
			  </div>
			</form>
			
			<br>
			<hr>
			
			<form name="form" action="mybooksearch.php" method="post" >
				<div class="row">
					<div class="large-12 columns" >
						<button name="submit" href="#" class="button small fontslabo" style="background-color:#5C73F2; width:100%;" >State Arrival</button>
					</div>
				</div>
			</form>
			
			<form name="form" action="signout.php" method="post" >
				<div class="row">
					<div class="large-12 columns" >
						<button name="submit" href="#" class="button small fontslabo" style="background-color:#5C73F2; width:100%;" >Sign out</button>
					</div>
				</div>
			</form>
	</div>
	


</div>
</div>



<script>
	function validateForm(form) {
		var a = form.checkin.value;
		var b = form.checkout.value;
		var c = form.totaladults.value;
		var d = form.totalchildrens.value;
			if(a == null || b == null || a == "" || b == "") 
			{
			 alert("Please choose date");
			 return false;
			}
			if(c == 0) 
			{
			 	if(d == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}
			if(d == 0) 
			{
			 	if(c == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}

	}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57205452-1', 'auto');
  ga('send', 'pageview');

</script>
</body></html>