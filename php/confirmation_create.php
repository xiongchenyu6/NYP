<?php
    require_once '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    $tenant = $_REQUEST['tenant'];
    $landlord = $_REQUEST['landlord'];

    $query ="INSERT INTO `comformation`(`tenant`, `landlord`) VALUES ('$tenant ','$landlord ') ";
     echo $query;
    
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
