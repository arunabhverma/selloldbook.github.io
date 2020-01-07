<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
			include 'conn.php';

			$id = $_GET['id'];
			$q="SELECT * FROM `book` WHERE id = '$id' ";
			$qurey= mysqli_query($conn,$q);
			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sell/Buy Old Books</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<?php

			while ($res = mysqli_fetch_array($qurey)) {
		
			
	
?>

<div style="border: 5px double black; padding: 10px; width: 200px;" align="center">
	<img src="<?php echo './'.$res['img'] ?>" height="250" width="150" style="border: 5px ridge; padding: 5px;">
	<p style="border: 1px solid black; ">Book Name: <b style="text-transform: uppercase;"><?php echo $res['name']; ?></b> </p>
	<p style="border: 1px solid black; ">Author Name: <b style="text-transform: uppercase;"><?php echo $res['author']; ?></b> </p>
	<p style="border: 1px solid black; ">Cost: <b style="text-transform: uppercase;"><?php echo "₹".$res['rupee']; ?></b> </p> 
	<button>Buy</button>
</div>
	
	<?php
		}

			
		?>



		<a href="show.php"><h3 align="center">GO BACK</h3></a>
</body>
</html>