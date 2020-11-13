<?php

include './auth.php';
$username = "";
$password = "";
$role ="customer";
$wrong_role = true;

	if(isset($_POST['newusername'])){
	$username = $_POST['newusername'];
	}
	if(isset($_POST['newpassword'])){
	$password = $_POST['newpassword'];
	}
	if(isset($_POST['cnewpassword'])){
	$cpassword = $_POST['cnewpassword'];
	}
	
		
	
	if($password==$cpassword){
			$sql = "INSERT INTO user (username, password, role) VALUES ('".$username."', '".$password."', '".$role."')";
			$result = mysqli_query($dbhandle, $sql);
			echo mysqli_error($dbhandle);
			
			
			header('Refresh: 3;url=index.php');
			
			echo "<!DOCTYPE html>\n";
			echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
			echo "\n";
			echo "    <!-- Bootstrap core CSS -->\n";
			echo "    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">\n";
			echo "    <!-- Custom styles for this template -->\n";
			echo "    <link href=\"css/dashboard.css\" rel=\"stylesheet\">\n";
			echo "	<link href=\"css/style.css\" rel=\"stylesheet\">\n";
			echo "	<link rel=\"stylesheet\" href=\"css/fontello.css\">\n";
			echo "    <link rel=\"stylesheet\" href=\"css/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"css/fontello-ie7.css\"><![endif]-->\n";
			echo "    \n";
			echo "<body>\n";
			echo "<div class=\"container\">\n";
			echo "	<div class=\"row\">\n";
			echo "		<div class=\"col-xs-3\">\n";
			echo "		</div>\n";
			echo "		<div class=\"col-xs-6 \">\n";
			echo "		<h4> Success. Please wait few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
			echo "		\n";
			echo "		</div>\n";
			echo "		<div class=\"col-xs-3\">\n";
			echo "		</div>\n";
			echo "	</div>\n";
			echo "</div>\n";
			echo "\n";
			echo "\n";
			echo "</body></html>";
	}
	else
	{
		echo "<script>alert('Passwords not matching.')</script>"; 
		header('Refresh: 1;url=index.php');
	}


?>