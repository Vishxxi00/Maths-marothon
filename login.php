<?php
include 'conn.php';



error_reporting(0);
if(isset($_POST['lsubmit'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM user WHERE email = '$email' AND password = '$password'"));
	
	if($check_email >0){
		$row = mysqli_fetch_assoc($check_email);
		$_SESSION["user_id"]=$row['id'];
		header("Location:index.php");
	}else{
		echo"<script>alert('Login details are incorrect! Please try again!')</script>";
	}
	
	session_start();
	echo $_SESSION["user_id"];
}
?>
<!doctype html> 
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="./css/login.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="./js/jquery-3.5.1.slim.min.js"></script>
	<script src="./js/bootstrap.bundle.min.js"></script>
</head>

</head>

<body>
	
	<div class="loginbox">
	<img src="./images/avatar.png" class="avatar">
		<h1>Login Here</h1>
		<form action"login.php" method="POST">
		<p>Username</p>
			<input type="text" name="email" placeholder="Enter Email" value="<?php echo $_POST['email']?>" required>
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" value="<?php echo $_POST['password']?>" required>
			<input type="submit" name="lsubmit" value="Login">
			<a href="Register.php">Don't have an account?</a>
		
		</form>
	</div>
</body>
</html>
