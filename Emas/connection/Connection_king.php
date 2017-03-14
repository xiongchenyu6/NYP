<?php
$hostname_localhost ="localhost";
$database_localhost ="kingdbtest";
$username_localhost ="root";
$password_localhost ="";

//echo "IP=$hostname_localhost \nUSER=$username_localhost \nPASSWORD=$password_localhost \nDATABASE=$database_localhost\n\n";

$localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost);

mysql_select_db($database_localhost, $localhost);

//echo "Connection OK \n\n";

?>