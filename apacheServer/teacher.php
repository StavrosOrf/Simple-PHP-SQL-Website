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

<html>
<head>
	<title>Home Page</title>
	 <style type = "text/css">
	 	body {
		  margin: 0;
		  padding: 0;
		}

		.logo {
		  float: left;
		  /*border-radius: 1px;*/

		}
		/* ~~ Top Navigation Bar ~~ */

		#navigation-container {
		  width: 100%;
		  margin: 0 auto;
		  height: 10%;
		}

		.navigation-bar {
		  background-color: #352d2f;
		  height: 70px;
		  width: 100%;
		  text-align:right;
		}
		.navigation-bar img{
		float:left;
		}
		.navigation-bar ul {
		  padding: 0px;
		  margin: 0px;
		  text-align: center;
		  display:inline-block;
		  vertical-align:top;
		}

		.navigation-bar li {
		  list-style-type: none;
		  padding: 0px;
		  height: 24px;
		  margin-top: 4px;
		  margin-bottom: 4px;
		  display: inline;
		}

		.navigation-bar li a {
		  color: black;
		  font-size: 16px;
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  text-decoration: none;
		  line-height: 70px;
		  padding: 5px 15px;
		  opacity: 0.7;
		}

	/*	#menu {
		  float: right;
		}*/
	 </style>
</head>
<body>

  <div class="navigation-bar">


    <div id="navigation-container">

      <a href="http://localhost:4000/teacher.php"><img  class="logo" src="https://i.imgur.com/Y4PR8PM.png"></a>

      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">MY name is</a></li>
        <li><a href="#">Log out</a></li>
      </ul>
    </div>

</body>

</html>