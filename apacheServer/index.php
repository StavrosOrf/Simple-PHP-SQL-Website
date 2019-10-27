<?php
$host = 'db';
$user  = 'st';
$password = 'st';
$db = 'test_db';
// include('index.css');
$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
	echo 'connection failed' . $conn->connect_error;
	exit;
}
session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  
  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
  $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
  $sql = "SELECT id FROM Teachers WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword'";
  $result = mysqli_query($conn,$sql);
  if(!$result->num_rows>0){
  	//header("location: index.php");
  	  $error = "Your Login Name or Password is invalid";
  }else{
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $active = $row['active'];

	  $count = mysqli_num_rows($result);

	    //session_register("myusername");
	     $_SESSION['login_username'] = $myusername;
	     $_SESSION['login_password'] = $mypassword;
	     
	     header("location: teacher.php");
	 // }else {
	   //  $error = "Your Login Name or Password is invalid!!! more than one";
 	// }
  }


}
?>
<html>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
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

   <body bgcolor = "#FFFFFF">
      </div>
      <div class="login-form">
    <form action = "" method = "post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input id="username" type="text" class="form-control" name = "username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input id="pass" type="password" class="form-control" name = "password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button id="login_button" type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <!-- <a href="#" class="pull-right">Forgot Password?</a> -->
        </div>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>        
    </form>
    <p class="text-center"><a href="http://localhost:4000/register.php">Create an Account</a></p>
</div>

   </body>
</html>