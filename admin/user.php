<?php
session_start();
include './auth.php';
$re = mysqli_query($dbhandle, "select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' AND role = 'admin' " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{

} 
else
{

session_destroy();
header("location: index.htm");
}
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="js/ie-emulation-modes-warning.js"></script-->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">
	<link rel="icon" href="../img/icon.png">

 </head>
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

function fnSearch()
		{
			var checkin=document.getElementById('checkin').value;
			var checkout=document.getElementById('checkout').value;
			var bookingid=document.getElementById('bookingid').value;
			var firstname=document.getElementById('firstname').value;
			$.ajax({
				type: "POST",
				url: "search.php",
				data: "checkin=" + checkin + "&checkout=" + checkout + "&bookingid=" + bookingid + "&firstname=" + firstname,
				success: function(resPonsE) 
					{
						document.getElementById('bookinginfo').innerHTML=resPonsE;
						return true;
					}
			});
		}
	  
	</script>
  <body style="background-color: #5C73F2;">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid" style="background-color: #4aa3df;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color: #ffffff;">Admin Booking Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="background-color: #829FD9">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signout.php" style="color: #ffffff;">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="background-color: #230A59">
          <ul class="nav nav-sidebar">
            <li ><a href="dashboard.php"><i class="icon-gauge"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            
			<li><a href="room.php"><i class="icon-key"></i> Rooms</a></li>
			
			<li class="active"><a href="user.php"><i class="icon-key"></i> Users</a></li>
			
			<li><a href="../home.php"><i class="icon-share"></i> Booking Page</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="roomdetail">
          

          <h2 class="sub-header">User Details</h2>
          <div class="table-responsive">
            <table class="table" style="background-color: white;">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody id="roominfo"  >
					<?php 
						include './auth.php';
						$result = mysqli_query($dbhandle, "select * from user");
						if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_array($result) ){
								print "                  <td>".$row['username']."</td>\n";
								print "                  <td>".$row['password']." </td>\n";
								print "                  <td>".$row['role']."</td>\n";
								print "                  <td><a href=\"edituser.php?id=".$row['id']."\" \">Edit</a></td><td><a class=\"delete\" href=\"deleteuser.php?del_id=".$row['id']."\">Delete</a></td></tr>";					
				
							}
						}			
					
					?>
				
               
              </tbody>
            </table>
          </div>
		 
		  <button type="button" class="btn" id="addroom" style="width: 100px; background-color: #4aa3df; color: white;" type="button">Add User</button>
        </div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="formnew" style="display:none;">
		<button type="button" class="btn" id="back" style="width: 100px; background-color: #4aa3df; color: white;">Back</button>
					<form role="form" id="formnew" action="adduser.php" method="post" enctype="multipart/form-data">
					  <div class="form-group">
						<label for="newusername">Username</label>
						<input type="text" class="form-control" name="newusername" id="newusername" required>
					  </div>
					  <div class="form-group">
						<label for="newpassword">Password</label>
						<input type="password" class="form-control" name="newpassword"   id="newpassword" required>
					  </div>
					   <div class="form-group">
						<label for="userrole">Role</label>
						<input type="text" class="form-control" name="userrole" id="userrole" placeholder="admin or customer">
					  </div>
					  <button id="addUserBtn" type="submit" class="btn btn-default" style="width: 100px; background-color: #4aa3df; color: white;">Add User</button>
					</form>
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
  <script>
  $( document ).ready(function() {
      $("#addroom").click(function(){
		$("#formnew").toggle();
		$("#roomdetail").toggle();
	  });
	  $("#back").click(function(){
		$("#formnew").toggle();
		$("#roomdetail").toggle();
	  });
	  
	  $("#formnew").submit(function(event) {
		  var newusername = $("#newusername").val();
		  var newpassword = $("#newpassword").val();
		  var role = $("#userrole").val();
		  var errors = "";
		  
		  if (!newusername) {
			  errors += "Username is missing!";
		  }
		  
		  if (!newpassword) {
			   errors += "\nPassword is missing!";
		  }
		  
		  if (!role || role == "") {
			  errors += "\nRole is missing!";
		  }
		  
		  if (errors != "") {
			alert(errors);
		  }
	  });
	});
	
	function moredetail(id)
	{
	var x = "booking"+id;
	document.getElementById(x).style.display = "block";
	}
	
	$('.delete').click (function () {
		return confirm ("Are you sure you want to delete?") ;
	}); 
  </script>

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1416326489703">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1416326489703" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>