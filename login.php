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

</head>

<body>
	
	<div class="loginbox">
	<img src="avatar.png" class="avatar">
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
<style>
body{
	margin:0;
	padding: 0;
	background:url("wall.jpg");
	background-size: cover;
	background-position: center;
	height: 100vh;
	font-family: sans-serif;
	
	
}
.loginbox{
	width: 380px;
	height: 500px;
	background: #000;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px
	
}
.avatar{
	width: 100px;
	height: 100px;
	border-radius: 50%;
	position: absolute;
	top: -50px;
	left: calc(50%  - 50px);
}

h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size: 22px;
}
.loginbox p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}

.loginbox input{
	width: 100%;
	margin-bottom: 20px;
	
}
.loginbox input[type="text"],input[type="Password"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
}
.loginbox input[type="submit"]
{
	border: none;
	outline: none;
	height: 40px;
	background: #fb2525;
	color: #fff;
	font-size: 18px;
	border-radius: 20px;
	
}
.loginbox input[type="submit"]:hover
{
	cursor: pointer;
	background: #e65c00;
	color: #000;
}
.loginbox a{
	text-decoration: none;
	font-size: 14px;
	line-height: 20px;
	color:darkgray;
	
}
.loginbox a:hover
{
	color: #e65c00;
}
</style>

</html>
