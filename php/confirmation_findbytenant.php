<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();

 $tenant = $_REQUEST['tenant'];
// get all products from products table
$result = mysql_query("SELECT *FROM comformation WHERE `tenant`=$tenant") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["users"] = array();
   
    while ($row = mysql_fetch_array($result)) {
            $user = array();
            $user["id"] = $row["id"];
            $user["tenant"] = $row["tenant"];  
            $user["landlord"] = $row["landlord"];  
            $user["landlord_C"] = $row["landlord_C"];  
            $user["date"] = $row["date"];    
        array_push($response["users"], $user);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode(($response))
;
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>

  