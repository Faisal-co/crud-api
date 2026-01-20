<?php
 // Step 1: In Headers telling all different clients that we are sending JSON data.
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
 //with GET search query in Browser Url/postman.
$search_value = isset($_GET['search']) ? $_GET['search'] : die(); 
// with POST simple way
/*$data = json_decode(file_get_contents("php://input"), true);// Here php://input is used instead of $_GET or $_POST because we want to get any type of data from the client.
$search_value = $data['search']; */// user will search by database name then for Security and for user giving name as search, as previously we give id as sid.
include ('config.php');
// Step 2 Search Query:
$search = $_GET['search'] ?? '';  
$sql = "SELECT * FROM students WHERE student_name LIKE '%$search_value%'"; // This is to show in Form at frontend.
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
// To Check if there is any record in the database.
if(mysqli_num_rows($result) >0){
// To convert in JSON format First Convert $result array into Associative arrow Combine.
$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // Converting $result array into Associative array Combine.
echo json_encode($output);

}
else{
// Simple array to show some message
echo json_encode(array('message'=>'No Search Found', 'status'=>false));

}

?>