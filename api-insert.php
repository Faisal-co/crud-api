<?php
// Step 1: In Headers telling all different clients that we are sending JSON data.
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *'); // which client can access this API
header('Access-Control-Allow-Methods: POST'); //Client Postman/Form/Ajax/Frontend se ane wale Method per limit lagana.
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input"), true);// Here php://input is used instead of $_GET or $_POST because we want to get any type of data from the client.
$name = $data['sname']; // In Comming All array just Change the name of column name to 'sname'because of security.
$age = $data['sage']; // In Comming All array just Change the name of column age to 'sage'because of security.
$city = $data['scity']; // In Comming All array just Change the name of column city to 'scity'because of security.
// here id = sid kaise ho gaya ??????????????????????
include ('config.php');
// Step 2:
$sql = "INSERT INTO students(student_name, age, city) VALUES('$name','$age','$city')"; // This is to show in Form at frontend.
if(mysqli_query($conn, $sql)){
echo json_encode(array('message'=>'Student Record Inserted', 'status'=>true));
 

}
else{
// Simple array to show some message
echo json_encode(array('message'=>'Student Record Not Inserted', 'status'=>false));

}


?>