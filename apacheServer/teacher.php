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
$sql = "SELECT NAME,SURNAME FROM Teachers WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword'" ;
$result = mysqli_query($conn,$sql);
if(!$result->num_rows>0){
  	session_unset();
  	// if not authenticated redirect to login page
  	header("location: index.php");

}

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$myname = $row['NAME'] ." " . $row['SURNAME'];
?>

<html>
<head>
	<title>Home Page</title>
	 <style type = "text/css">
	 	body {
	 	  background-image: url("https://wallup.net/wp-content/uploads/2016/07/20/34502-simple_background.jpg");
	 	  background-repeat: no-repeat;
	 	  background-size: 100%;
		  margin: 0;
		  padding: 0;
		}

		.logo {
		  float: left;
		  z-index: 20;
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
		  color: white;
		  padding: 0px;
		  height: 24px;
		  margin-top: 4px;
		  margin-bottom: 4px;
		  display: inline;
		}

		.navigation-bar li a {
		  color: white;
		  font-size: 16px;
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  text-decoration: none;
		  line-height: 70px;
		  padding: 5px 15px;
		  opacity: 0.7;
		}


		.push_button {
		    position: relative;
		    width:220px;
		    height:220px;
		    text-align:center;
		    
		    color:#FFF;
		    line-height:43px;
		    display: inline-block;
		    margin: 5%;
		}
		.push_button:before {
		    background:#f0f0f0;
		    background-image:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#D0D0D0), to(#f0f0f0));
		    
		    border-radius:5px;
		    box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF;
		    
		    position: absolute;
		    content: "";
		    left: -6px; right: -6px;
		    top: -6px; bottom: -10px;
		    z-index: -1;
		}

		.push_button:active {
		    -webkit-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset;
		    top:5px;
		}
		.push_button:active:before{
		    top: -11px;
		    bottom: -5px;
		    content: "";
		}

		.blue {
		    text-shadow:-1px -1px 0 #2C7982;
		    background: #1a53ff;
		    border:1px solid #002699;
		    background-image:linear-gradient(top, #668cff, #3EACBA);
		    
		    border-radius:5px;
		   
		    box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
		}

		.blue:hover {
		    background: #668cff;
		    background-image:linear-gradient(top, #3EACBA, #668cff);
		}
		.title{
			text-align: center;
			margin-top: 5%;
			padding-right: 25%;

		}

		.buttons{
			text-align: center;
		}
		.dropdown-content {
		  background-image: url("http://www.inn.spb.ru/images/500/DSC100514639.jpg");
	 	  background-repeat: no-repeat;
	 	  background-size: 100%;
		  display: none;
		  position: absolute;
		  background-color: blue;
		  width: 100%;
		  left: 0;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		  margin-top: 6%;
		}

		.dropdown-content .header {
		  background: red;
		  padding: 16px;
		  color: white;
		}

		.dropdown:hover .dropdown-content {
		  display: block;
		}

		.dropdown .dropbtn {
		  display: inline-block;
		  float: left;
		  font-size: 30px;  
		  border: none;
		  outline: none;
		  color: white;
		  padding: 14px 16px 20px 20px;
		  background-color: inherit;
		  font: inherit;
		  margin-top: 2%;
		  margin-right: 40%;
		  margin-left: 10%;
		}

	 </style>
</head>
<body>

  <div class="navigation-bar">


    <div id="navigation-container">

          <div class="dropdown">
		    <a href="http://localhost:4000/teacher.php"><img  class="logo" src="https://i.imgur.com/Y4PR8PM.png"></a>
		    <div class="dropdown-content">
		          <div>
			    	<div class="buttons">
			    		<a class="push_button blue" href="http://localhost:4000/AddStudent.php" style="background-image: url('https://cdn1.iconfinder.com/data/icons/education-set-6/512/add_user-512.png'); background-size: 100%;">Add a new Student </a> 
			   		 	<a class="push_button blue" href="http://localhost:4000/EditStudent.php" style="background-image: url('https://cdn0.iconfinder.com/data/icons/mobile-development-icons/256/Edit_user.png'); background-size: 100%;">Edit a current Student</a>
			   		 	<a class="push_button blue" href="http://localhost:4000/DeleteStudent.php" style="background-image: url('https://cdn1.iconfinder.com/data/icons/education-set-6/512/delete-user-512.png'); background-size: 100%;">Delete a Student</a> 
			   		 	<a class="push_button blue" href="http://localhost:4000/SearchStudent.php" style="background-image: url('https://cdn4.iconfinder.com/data/icons/student-ui/1172/student_search-512.png'); background-size: 100%;">Search a student</a>
			   		</div>
			    </div>
		    </div>
		  </div>
	 <ul> 
        <li>Connected User: <?php echo $myname; ?></li>
        <li><a href="http://localhost:4000/index.php">Log out</a></li>
      </ul>
    </div>

    <div>
    	<h1 class="title">Welcome , choose one of the following Options!</h1>
    	<div class="buttons">
    		<a class="push_button blue" href="http://localhost:4000/AddStudent.php" style="background-image: url('https://cdn1.iconfinder.com/data/icons/education-set-6/512/add_user-512.png'); background-size: 100%;">Add a new Student </a> 
   		 	<a class="push_button blue" href="http://localhost:4000/EditStudent.php" style="background-image: url('https://cdn0.iconfinder.com/data/icons/mobile-development-icons/256/Edit_user.png'); background-size: 100%;">Edit a current Student</a>
   		 	<a class="push_button blue" href="http://localhost:4000/DeleteStudent.php" style="background-image: url('https://cdn1.iconfinder.com/data/icons/education-set-6/512/delete-user-512.png'); background-size: 100%;">Delete a Student</a> 
   		 	<a class="push_button blue" href="http://localhost:4000/SearchStudent.php" style="background-image: url('https://cdn4.iconfinder.com/data/icons/student-ui/1172/student_search-512.png'); background-size: 100%;">Search a student</a>
   		</div>
    </div>
    

</body>

</html>