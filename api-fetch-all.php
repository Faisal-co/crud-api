<?php
// 
// Step 1: In Headers telling all different clients that we are sending JSON data.
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');// Method will come from postman or frontend coding. 

include ('config.php');
// Step 2:
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
// To Check if there is any record in the database.
if(mysqli_num_rows($result) >0){
// To convert in JSON format First Convert $result array into Associative arrow Combine.
$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // Converting $result array into Associative arrow Combine.
echo json_encode($output);

}
else{
// Simple array to show some message
echo json_encode(array('message'=>'No Record Found', 'status'=>false));

}

?>