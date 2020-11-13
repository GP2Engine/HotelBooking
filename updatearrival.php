<?php
session_start();
include './auth.php';
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

$booking_id = $_SESSION['booking_id'];

$sql3 = "UPDATE booking SET payment_status='confirmed' WHERE booking_id='".$booking_id."';";
$result2 = mysqli_query($dbhandle, $sql3);
	
	
header("Refresh: 3;url=mybooksearch.php");
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "\n";
echo "    <!-- Bootstrap core CSS -->\n";
echo "    <link href=\"admin/css/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <!-- Custom styles for this template -->\n";
echo "    <link href=\"admin/css/dashboard.css\" rel=\"stylesheet\">\n";
echo "	<link href=\"admin/css/style.css\" rel=\"stylesheet\">\n";
echo "	<link rel=\"stylesheet\" href=\"admin/css/fontello.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"admin/css/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"admin/css/fontello-ie7.css\"><![endif]-->\n";
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

?>