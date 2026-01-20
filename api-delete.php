<?php
// Step 1: In Headers telling all different clients that we are sending JSON data.
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE'); // 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input"), true);// Here php://input is used instead of $_GET or $_POST because we want to get any type of data from the client.
$student_id = $data['sid']; // In Comming All array just Change the name of column id to 'sid' because of security.
// here id = sid is comming from postman OR any other client conding like frontend browser coding.
include ('config.php');
// Step 2:
$sql = "DELETE FROM students WHERE id = '$student_id'"; // This is to show in Form at frontend.
// To Check if there is any record in the database.
if(mysqli_query($conn, $sql)){
// Just echo some message
echo json_encode(array('message'=>'Student Record Deleted', 'status'=>true));

}
else{
// Before Just echo some message we can check the id is already present or not but now it will show for which record is even not present.
echo json_encode(array('message'=>'Student Record not Deleted', 'status'=>false));

}


?>