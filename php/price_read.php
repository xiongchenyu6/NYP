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
$town= $_REQUEST['town'];
// get all products from products table
$result = mysql_query("SELECT *FROM price WHERE `TOWN`=$town") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["users"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
            $user = array();
            $user["TOWN"] = $row["TOWN"];
            $user["1-ROOM"] = $row["1-ROOM"];  
            $user["2-ROOM"] = $row["2-ROOM"];  
            $user["3-ROOM"] = $row["3-ROOM"];  
            $user["4-ROOM"] = $row["4-ROOM"];  
            $user["5-ROOM"] = $row["5-ROOM"];  
            $user["EXECUTIVE"] = $row["EXECUTIVE"];                  
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
