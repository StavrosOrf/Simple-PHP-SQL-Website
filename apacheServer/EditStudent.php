<?php
$host = 'db';
$user  = 'st';
$password = 'st';
$db = 'test_db';

session_start();

$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
	echo 'connection failed' . $conn->connect_error;
	exit;
}
$myusername = $_SESSION['login_username'];
$mypassword = $_SESSION['login_password'];
//echo "Hello World fron teacher.php" . $myusername . $mypassword;

//Checking if the user is authenticated to visit this site
$sql = "SELECT id FROM Teachers WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword'" ;
$result = mysqli_query($conn,$sql);
if(!$result->num_rows>0){
  	session_unset();
  	// if not authenticated redirect to login page
  	header("location: index.php");

}
?>