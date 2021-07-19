<?php
  include("classes/connect.php");
  include("classes/signup.php");

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $signup = new Signup();
    $signup->userexist($_POST);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title> 
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="images/new.svg">
            <p>Already a user?<br/><a href="login.php" style="text-align:center;color:#b36eb6;">Sign in</a></p>
		</div>
		<div class="login-content">
			<form method="POST" action="">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   	<div class="i">
           		   		<i class="fas fa-user"></i>
           		   	</div>
           		   	<div class="div">
           		   		<input type="text" name="username" class="input" placeholder="Username" required>
           		   	</div>
           		</div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="mail" class="input" placeholder="Email" required>
                    </div>
                </div>
           		<div class="input-div pass">
           		   	<div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   	</div>
           		   	<div class="div">
					<input type="password" name="password" class="input" placeholder="Password" required>
            	   	</div>
            	</div>
                <div class="input-div pass">
           		   	<div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   	</div>
           		   	<div class="div">
					<input type="password" name="confirm-password" class="input" placeholder="Confirm password" required>
            	   	</div>
            	</div>
                <p>By registering your account you agree to<a href="#" style="color:#b36eb6;text-align:center">Terms & Privacy</a></p>
            	<input type="submit" type="submit" class="btn" value="Register">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>