<?php
session_start();

$_SESSION['user-email'] = "";

include 'authorization.php';

$searchmail = "";

if(!empty($searchmail)){
	$searchmail = $_POST['user-email'];
}

include './auth.php';

	if(!empty($_POST['user-email'])){
					$result = mysqli_query($dbhandle, "select * from booking where email = '".$_POST['user-email']."' and payment_status like 'pend%';");
	} else {
		$result =  mysqli_query($dbhandle, "select booking.*  from booking;");
		echo mysqli_error($dbhandle);	
	}	

	//echo mysqli_error($dbhandle);	
	if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result) ){
							print "<tr style=\"\">		 <td>".$row['booking_id']."</td>\n";
							print "                  <td>".$row['checkin_date']."</td>\n";
							print "                  <td>".$row['checkout_date']."</td>\n";
											print "<td>";
											$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, room.room_name AS name
																FROM roombook
																LEFT JOIN room ON roombook.room_id = room.room_id
																WHERE roombook.booking_id =".$row['booking_id'].";");
											while($r = mysqli_fetch_array($q))
											{
											print "                  ".$r['total']." ".$r['name']."<br> \n";
											}
											print "</td>";
							print "                  <td>Adult:".$row['total_adult']."<br>Child:".$row['total_children']."</td>\n";
							print "                  <td>".$row['total_amount']."</td>\n";
							print "                  <td>".$row['deposit']."</td>\n";
							print "                  <td>".($row['total_amount']-$row['deposit'])."</td>\n";
							print "                  <td>".$row['payment_status']."</td><td><a href=\"mybooksearchdetails.php?booking=".$row['booking_id']."\"  \">More Details</a></td></tr>";					
			
				}
			}
	else{
	print "<tr><td>No Pending Bookings Found for that E-mail</td></tr>";
	}
?>
