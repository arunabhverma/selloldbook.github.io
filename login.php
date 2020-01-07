<?php
session_start();

include 'conn.php';
if(isset($_POST['submit'])){


// ??'' for remove the notice in line no 6,7 "$user=$_POST['user']; $password=$_POST['password'];" 

$user=$_POST['user']??'';
$password=$_POST['password']??'';

$q="select * from registration where user = '$user' && password = '$password'";
$result = mysqli_query($conn, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {
	
	$_SESSION['username']=$user;
	header('location:index.php');
}
else
{
	echo "<p style='color:red'>Wrong username and password please try again</p>";
	// echo "<script>alert('Please registor first yourself');</script>";
// header('location:login.php');
}
}


?> 
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<fieldset style="width: 30%">
		<legend>Login</legend>
	<form action= "<?php $_PHP_SELF ?>"  method="post" >
		
	
	<table>
		<tr>
			<td>User :</td><td><input type="text" name="user" required;></td>
			
		</tr>
		<tr>
			
			<td>Password :</td><td><input type="Password" name="password" required></td>
			
		</tr>
		
		<tr>
			<td><input type="submit" name="submit" value="login"></td><td><a href="Register.php">Register</a></td>
		</tr>
		</table>
		</fieldset>
</body>
</html>
