<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
include 'conn.php';
if (isset($_POST['submit'])) {
	$name= $_POST['name-books'];
	$author= $_POST['author-name'];
	$rupee=$_POST['rupee'];
	$catagory=$_POST['catagory'];
	$dir="img/";
	$img=$dir.basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$img);

	// echo "$catagory";
	$cat_query = "SELECT `catid` FROM `catagory` WHERE catagories = '$catagory'";
	$cat_q = mysqli_query($conn,$cat_query);
	// if ($cat_q) {
	// 	echo " yes";
	// }
	// else {
	// 	echo " no";
	// }
	while ($res = mysqli_fetch_array($cat_q)) {
		$cat =$res['catid'];
	}
	// echo $cat;

	$q="INSERT INTO `book`(`cat-id`,`name`, `author`,`rupee`,`img`) VALUES ('$cat','$name', '$author','$rupee','$img')";

	$query = mysqli_query($conn, $q);
	if($query){
		echo "<script>alert('Your Book is Submitted Successfully....')</script>";
	}
	else{
		echo "<script>alert('Please try again..')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert A Books</title>
</head>
<body>
	<h1 style="text-transform: uppercase; text-align-last:  center;color: red;">Enter you book in our Database</h1>
<table border="5" align="center">
	<a href="logout.php">Logout</a>
	<form action="" method="post" enctype="multipart/form-data">
	<tr>
		<td>Name of book</td><td><input type="text" name="name-books" required></td>
	</tr>
	<tr>
		<td>Author name</td><td><input type="text" name="author-name" required></td>
	</tr>
	<tr>
		<td>Cost(in ₹)</td><td><input type="number" name="rupee" required></td>
	</tr>
	<tr>
		<td>Catagories</td><td>
			<select name="catagory">
			<option disabled selected>Catagories of book</option>
			<?php
				include 'conn.php';
				$q="SELECT * FROM `catagory`";
				$qurey= mysqli_query($conn,$q);
		
				while ($res = mysqli_fetch_array($qurey)) {
			?>
				<option><?php echo $res['catagories']; ?></option>
				
			<?php 
				}
			?>
		</select></td>
	</tr>
	<tr>
		<td>Front of book</td><td><input type="file" name="file" accept="image/*"  required></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit"></td>
	</tr>
</table>
</body>
</html>