<?php 

require_once('../connection/Connection_king.php');
 
$result = mysql_query("SELECT * FROM state where mac = '00158d000021cda7' and name = 'LIGHT' and dt > CURRENT_TIMESTAMP() - INTERVAL 24 HOUR");

while($row=mysql_fetch_assoc($result))

	$output[]=$row;
	

print(json_encode($output));
// close mysql connection 
mysql_close();

?>