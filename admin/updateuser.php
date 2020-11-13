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

$user_id  = $_POST['user_id'];
$edit_username = "";
$edit_password = "";
$edit_role ="";
$wrong_role = true;

	if(isset($_POST['edit_username'])){
		$edit_username =$_POST['edit_username'];
	}
	if(isset($_POST['edit_password'])){
		$edit_password = $_POST['edit_password'];
	}
	if(isset($_POST['edit_role'])){
		$edit_role = $_POST['edit_role'];
	}
	
if (($edit_role == "admin" or $edit_role == "customer") && ($edit_role != "" && isset($_POST['edit_role']))) {
	$wrong_role = false;
}
	
if(isset($_POST['edit_password']) && !empty($_POST['edit_password']) && !$wrong_role)
{	
	$sql = "UPDATE user
	SET password='".$edit_password."', role='".$edit_role."'
	WHERE id='".$user_id."';";
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

}  elseif ($wrong_role) {
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
	echo "		<h4> Role value is wrong. Expected admin or customer.Please try again...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
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
echo "		<h4> Password or Role is missing (or both). Please try again...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
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

?>