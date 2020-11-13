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

$username = "";
$password = "";
$role ="";
$wrong_role = true;

	if(isset($_POST['newusername'])){
	$username = $_POST['newusername'];
	}
	if(isset($_POST['newpassword'])){
	$password = $_POST['newpassword'];
	}
	if(isset($_POST['userrole'])){
		$role = $_POST['userrole'];
		if ($role == 'customer' or $role == 'admin') {
			$wrong_role = false;
		}
	}
		
	/* and new username doesnt exist*/
	if (!$wrong_role) {
		$sql = "INSERT INTO user (username, password, role) VALUES ('".$username."', '".$password."', '".$role."')";
		$result = mysqli_query($dbhandle, $sql);
		echo mysqli_error($dbhandle);
		
		
		header('Refresh: 3;url=user.php');
		
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
	} else {
		echo "<script>alert('Error. Expected admin or customer value.')</script>"; 
		header('Refresh: 2;url=user.php');
	}

?>