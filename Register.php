<?php
include'conn.php';

error_reporting(0);
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	
	$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'"));
	
	if($password !== $cpassword){
	echo "<script>alert('password not matched!')</script>";
	}
	elseif($check_email >0){
			echo "<script>alert('Email is already exsisting in the database!')</script>";
	}else{
		
		$sql = "INSERT INTO user(email,password)
		VALUES('$email','$password')";
		$result = mysqli_query($conn,$sql);
		
		
		if($result){
			$_POST["email"]="";
			$_POST["password"]="";
			$_POST["cpassword"]="";
			
				echo "<script>alert('User registration successfully.')</script>";
				header("Location:login.php");
		}else{
			echo "<script>alert('User registration Failed.')</script>";
		}
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<link rel="stylesheet"  type="text/css" href="registercss.css">
</head>

<body>
	<div class="Registerbox">
		<img src="avatar.png" class="avatar">
		<h1>Register Here</h1>
		<form action="Register.php" method="POST">
			<p>Email</p>
			<input type="email" name="email" placeholder="Enter Email" value ="<?php echo $_POST["email"]?>" required>
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" value ="<?php echo $_POST["password"]?>" required>
			<p> Confirm Password</p>
			<input type="Password" name="cpassword" placeholder="Enter Password again" value ="<?php echo $_POST["cpassword"]?>" required>
			<input type="submit" name="submit" value="Register">
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

.Registerbox{
	width: 380px;
	height: 500px;
	background: #000;
	color: #fff;
	top: 55%;
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
.Registerbox p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}
.Registerbox input{
	width: 100%;
	margin-bottom: 20px;
}
.Registerbox input{
	width: 100%;
	margin-bottom: 20px;
	
}
.Registerbox input[type="text"],input[type="Password"],input[type="email"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
}
.Registerbox input[type="submit"]
{
	border: none;
	outline: none;
	height: 40px;
	background: #fb2525;
	color: #fff;
	font-size: 18px;
	border-radius: 20px;
	
}
.Registerbox input[type="submit"]:hover
{
	cursor: pointer;
	background: #e65c00;
	color: #000;
}
.Registerbox a{
	text-decoration: none;
	font-size: 14px;
	line-height: 20px;
	color:darkgray;
	
}
.Registerbox a:hover
{
	color: #e65c00;
}

</style>
	

</html>
