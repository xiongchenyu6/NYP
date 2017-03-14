<?php 

require_once('../connection/Connection_king.php');
 
$result = mysql_query("SELECT * FROM state where mac = '00158d000021cda8' and name = 'TEMPERATURE' and dt > CURRENT_TIMESTAMP() - INTERVAL 24 HOUR");

while($row=mysql_fetch_assoc($result))

	$output[]=$row;
	

print(json_encode($output));
// close mysql connection 
mysql_close();

?>