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

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
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
  <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">
	<link rel="icon" href="img/icon.png">


 </head>
 
 <body style="background: url('img/background.jpg') no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;">
	<br></br>
	
<div class="container" style="background-color: #5C73F2; max-width: 800px; margin: auto;">
<div>
          

          <h2 class="sub-header">My Booking Details</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Particulars</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody >
			  <?php 
			  include './auth.php';
			  $result = mysqli_query($dbhandle, "Select * from booking where booking_id=".$_GET['booking']."");
				if( mysqli_num_rows($result) >0){
					while ($rows = mysqli_fetch_array($result)){
										
					print "				<tr><td>Booking ID</td>\n";
					print "				<td>".$rows['booking_id']." </td></tr>\n";
					print "				<tr><td>Room Book</td>\n";
					print "<td>";
					$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, room.room_name AS name
																FROM roombook
																LEFT JOIN room ON roombook.room_id = room.room_id
																WHERE roombook.booking_id =".$rows['booking_id'].";");
																echo mysqli_error($dbhandle);
											while($r = mysqli_fetch_array($q))
											{
											print "                  ".$r['total']." ".$r['name']."<br> \n";
											}
					print "</td>";
					print "				</tr>\n";
					print "				<tr><td>Total Adult</td>\n";
					print "				<td>".$rows['total_adult']." </td></tr>\n";
					print "				<tr><td>Total Children</td>\n";
					print "				<td>".$rows['total_children']." </td>	</tr>\n";
					print "				<tr><td>Checkin Date</td>\n";
					print "				<td>".$rows['checkin_date']."</td></tr>\n";
					print "				<tr><td>Checkout Date</td>\n";
					print "				<td>".$rows['checkout_date']."</td></tr>\n";
					print "				<tr><td>Special Requirements</td>\n";
					print "				<td>".$rows['special_requirement']."</td></tr>\n";
					print "				<tr><td>Arrival Status</td>\n";
					print "				<td>".$rows['payment_status']." </td>	</tr>\n";
					print "				<tr><td>Total Amount</td>\n";
					print "				<td>EUR ".$rows['total_amount']."</td></tr>\n";
					print "				<tr><td>Deposit</td>\n";
					print "				<td>EUR ".$rows['deposit']."</td></tr>\n";
					print "				<tr><td>Balance</td>\n";
					print "				<td>EUR ".($rows['total_amount']-$rows['deposit'])."</td></tr>\n";
					print "				<tr><td>Booking Date</td>\n";
					print "				<td>".$rows['booking_date']." </td>	</tr>\n";
					print "				<tr><td>First Name</td>\n";
					print "				<td>".$rows['first_name']." </td>	</tr>\n";
					print "				<tr><td>Last Name</td>\n";
					print "				<td>".$rows['last_name']." </td>	</tr>			\n";
					print "				<tr><td>Email</td>\n";
					print "				<td>".$rows['email']." </td>	</tr>\n";
					print "				<tr><td>Telephone</td>\n";
					print "				<td>".$rows['telephone_no']."</td></tr>\n";
					print "				<tr><td>Address Line 1</td>\n";
					print "				<td>".$rows['add_line1']." </td>	</tr>\n";
					print "				<tr><td>Address Line 2</td>\n";
					print "				<td>".$rows['add_line2']."</td></tr>		</tr>\n";
					print "				<tr><td>City</td>\n";
					print "				<td>".$rows['city']."</td></tr>	</tr>\n";
					print "				<tr><td>State</td>\n";
					print "				<td>".$rows['state']."</td></tr>	</tr>\n";
					print "				<tr><td>Postcode</td>\n";
					print "				<td>".$rows['postcode']."</td></tr>	</tr>\n";
					print "				<td>Country</td>\n";
					print "				<td>".$rows['country']."</td></tr>	</tr>";
								
					
					}
				
				}
			  ?>
				
              </tbody>
            </table>
          </div>
		  <form  role="form" action="updatearrival.php" method="post">
			<?php
			include './auth.php';
			$_SESSION['booking_id'] = $_GET['booking'];
			?>
			<button type="submit" class="btn" id="editbook" style="width: 100px; background-color: #4aa3df; color: white;" type="button">State Arrival</button>			
		  </form>
		  <br>
		<button type="button" class="btn" onclick="window.location.href='mybooksearch.php';" style="width: 100px; background-color: #4aa3df; color: white;" type="button">Back</button>
		  	
        </div>
		</div>
</body>		