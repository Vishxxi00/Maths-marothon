<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="mathsmarothon";
$port ="3308";

// Create connection
$conn = new mysqli($servername, $username, $password,$database,$port);

// Check connection
if(!$conn){
	echo"<script>alert('connection failed')</script>";
}
?>