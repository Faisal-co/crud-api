<?php
// Note: Hamesha Infromation & Type of Method Postman/frontend coding se aati hai.
// Step 1:
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"), true);// Here php://input is used instead of $_GET or $_POST because we want to get any type of data from the client.
$student_id = $data['sid']; // In Comming All array just Change the name of column id to 'sid' because of security
// & coming from postman OR any other client conding like frontend browser coding. 
include ('config.php');
// Step 2:
$sql = "SELECT * FROM students WHERE id = '$student_id'"; 
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
// To Check if there is any record in the database.
if(mysqli_num_rows($result) >0){
// To convert in JSON format First Convert $result array into Associative arrow Combine.
$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // Converting $result array into Associative array Combine.
echo json_encode($output);

}
else{
// Simple array to show some message
echo json_encode(array('message'=>'No Record Found', 'status'=>false));

}


?>