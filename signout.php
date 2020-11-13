<?php
include('config.php');
if(isset($_SESSION['access_token'])){
	$google_client->revokeToken($_SESSION['access_token']);
}
session_start();
session_destroy();
header('Refresh: 2;url=index.php');
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
echo "		<h4> Logout Successful. Redirecting to Login Page...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
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