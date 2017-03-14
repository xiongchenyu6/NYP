<?php 
session_start();
require_once('../connection/Connection_king.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'adminlogin' && !empty($_POST['username']) && !empty($_POST['password']))
{
	$sql = "SELECT COUNT(*) AS num_users FROM admin WHERE username='" .$_POST['username']. "'" ." AND password='" .$_POST['password']. "'";
	$result = mysql_query($sql);
	if($result)
	{
		$response=mysql_fetch_assoc($result);
		if($response['num_users'] > 0)
		{
			$_SESSION['adminloggedin'] = 1;
			$_SESSION['adminusername'] = $_POST['username'];
			header('Location: /emas/map.php');
		} 
		else
		{
			$_SESSION['adminloggedin'] = 2;
			header('Location: /emas/');
		}
	}
	exit;
}
else if($_GET['action'] == 'adminlogout')
{
	session_destroy();
	header('Location: /emas/');
	exit;
}
else
{
	header('Location: /emas/');
	exit;
}
?>