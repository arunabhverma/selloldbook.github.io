<?php
session_start();
// header('location:login.php');

include 'conn.php';
if (isset($_POST['submit'])) {
 	
// ??'' for remove the notice in line no 7,8 "$user=$_POST['user']; $password=$_POST['password'];"
$user=$_POST['user']??'';
$password=$_POST['password']??'';
// echo "$user $password";
$q="select * from registration where user = '$user' && password = '$password'";
$result = mysqli_query($conn, $q);
// if ($result) {
// 	echo "hello world";
// }
// else{
// 	echo "buy world";
// }

$num = mysqli_num_rows($result);
 // echo $num;

if ($num == 1) {
	echo "<script>alert('You Are Already Registor. please login');</script>";
	
	
}
else
{

	
	$qry = "INSERT INTO 
			registration(
			user, 
			password)
			VALUES (
			'$user',			
			'$password')";

	$a=mysqli_query($conn, $qry);
	if($a){
		echo "<script>alert('Welcome in books world');</script>";
	}
	else {
		$var="<script>confirm('Please try again later');</script>";
		if ($var) {
			echo "$var";
			header('location:login.php');
		}
	}
}
}

?> 
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>
	
		
	
	<fieldset style="width: 30%">
		<legend>Registration</legend>
	<form action= "<?php $_PHP_SELF ?>"  method="post" >
	<table>
		<tr>
			<td>User Name : </td><td><input type="text" name="user" required;></td>
			
		</tr>
		
		<tr>
			
			<td>Password : </td><td><input type="password" name="password" required;></td>
			
		</tr>
		
		
		<tr>
			<td><input type="submit" name="submit" value="Registration"></td><td><a href="login.php">login</a></td>
		</tr>
		</table>
		</fieldset>
</body>
</html>
