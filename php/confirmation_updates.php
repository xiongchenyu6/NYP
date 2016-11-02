<?php
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 $landlord = $_REQUEST['landlord'];
 $tenant = $_REQUEST['tenant'];
 $landlord_C= $_REQUEST['landlord_C'];
    
    $query ="UPDATE `comformation` SET `landlord_C` = '$landlord_C' WHERE `landlord`=$landlord AND `tenant`=$tenant";
    if (
    $result = mysql_query($query))
 {
        
        echo 'Success';
        mysql_close();
        
        
    } else {
        echo 'Error Inserting Content';
        exit();
    }
?>