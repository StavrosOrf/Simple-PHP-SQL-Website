<?php
$host = 'db';
$user  = 'st';
$password = 'st';
$db = 'test_db';
$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
  echo 'connection failed' . $conn->connect_error;
  exit;
}
session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  
  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
  $sql = "SELECT id FROM Teachers WHERE USERNAME = '$myusername'";
  $result = mysqli_query($conn,$sql);
  
  
  if(!$result->num_rows>0){
    //checking if teacher table is created(just for the first time)
      $sql = "CREATE TABLE Teachers (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        NAME VARCHAR(30) NOT NULL,
        SURNAME VARCHAR(30) NOT NULL,
        USERNAME VARCHAR(30) NOT NULL,
        PASSWORD VARCHAR(30) NOT NULL,
        EMAIL VARCHAR(30) NOT NULL
        )";

      if ($conn->query($sql) === TRUE) {
          //echo "Table MyGuests created successfully";
      } else {
          //echo "Error creating table: " . $conn->error;
      }

      $password = mysqli_real_escape_string($conn,$_POST['password']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $surname = mysqli_real_escape_string($conn,$_POST['surname']);

      $sql = "INSERT INTO Teachers (NAME, SURNAME, USERNAME,PASSWORD,EMAIL)
      VALUES ($name,$surname,$myusername,$password,$email)";

      if ($conn->query($sql) === TRUE) {
         // echo "New record created successfully";
      } else {
         // echo "Error: " . $sql . "<br>" . $conn->error;
      }

      header("location: index.php");
  }else{
       $error = "Username already exists !!!";
  }


}
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action = "" method = "post">
        <h2 class="text-center">Register</h2>       
        <div class="form-group">
            <input id="username" type="text" class="form-control" name = "username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input id="email" type="text" class="form-control" name = "email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input name="name" type="password" class="form-control" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <input name="surname" type="password" class="form-control" placeholder="Surname" required="required">
        </div>
        <div class="form-group">
            <button id="reg_button" type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		<div>
            <a href="http://localhost:4000/index.php" class="pull-right">Already a user?</a>
        </div>
    </form>
</div>

</body>
</html>                                		                            
