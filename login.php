<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $login = new Login();
  $result=$login->evaluate($_POST); 
  if($result != ""){
	echo '<script type="text/javascript">',
		 'alert("WRONG USERNAME OR PASSWORD")',
		 '</script>';
  }
  else{
	  header("Location: homepage.php");
	  die;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="images/login.svg">
		</div>
		<div class="login-content">
			<form method="POST" action="#">
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
           		<div class="input-div pass">
           		   	<div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   	</div>
           		   	<div class="div">
					<input type="password" name="password" class="input" placeholder="Password" required>
            	   	</div>
            	</div>
            	<a href="signup.php">New Here!</a>
            	<input type="submit" type="submit" class="btn" value="LOGIN">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>