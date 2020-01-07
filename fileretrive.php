<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<style type="text/css">
		.grid{
			background: lightgray;
			display: grid;
			padding: 20px;
			grid-column-gap: 20px;
			grid-row-gap: 20px;
			grid-template-columns:  auto auto auto auto ; 
		}
		.grid-item{
			background: white;
			padding: 20px;
			text-align: center;
			font-size: 20px;
			border: 5px solid white;

			
		}

		.grid-item:hover{
			box-shadow: 15px 15px 18px gray;
			border: 5px solid darkgray;
			transform: rotate(5deg);
		}
		.b{
			background: red;
			

			display: grid;
			grid-column-gap: 20px;
			grid-template-columns: 200px auto; 
		}
	
	</style>
</head>
<body>
	
		<h1 align="center">Welcome <?php echo $_SESSION['username'] ?></h1>
		<div class="b">
<div class="a">
	
	<a href="logout.php">Logout</a><br>
	<a href="fileinsert.php" target="_blank">Insert a book</a><br>
	<a href="login.php" target="_blank">Login</a><br>
	<!-- <a href="signin.php" target="_blank">Insert a book</a> -->

	<!-- Search -->
	<form action="search.php" method="get">
		<input type="search" name="search" placeholder="search">
		<input type="submit" name="submit" value="search">
	</form>
	
	<!-- filter -->
	<ul name="filter">
			<b>Filter</b>
			
			<li><a id="asc" href="?filter=asc">Asc by cost</a></li>
			<li><a id="desc" href="?filter=desc">Des by cost</a></li>
			<li><a id="norm" href="?filter=norm">Normal Again</a></li>
		 	

			
		</ul>

	

	
		<ul name="select">
			<b>CATAGORY</b>
			

			<?php
				include 'conn.php';
				$q="SELECT * FROM `catagory`";
				$qurey= mysqli_query($conn,$q);
					// if($qurey){
					// 	echo "done";
					// }
					// else{
					// 	echo "not done";
					// }

				while ($res = mysqli_fetch_array($qurey)) {
					// echo $res['catid'];
			?>
				<li><a href="fileretrive2.php?catid=<?php echo $res['catid'] ?>"><?php echo $res['catagories']; ?></a></li>
				
			<?php 
				}
			?>
			<li><a href="index.php">Norma Again</a></li>
		</ul>
</div>
<div class="a">
	<div class="grid">
		<?php
			include 'conn.php';
			// $q="SELECT * FROM `book`";
			// $qurey= mysqli_query($conn,$q);
		
		 	// if($_GET['asc'] == 'on' && $_GET['submit'] == 'done'){
		 	// 	echo "asc";

				// }
				// elseif ($_GET['desc'] == 'on' && $_GET['submit'] == 'done') {
				//  	echo "desc";
				//  } 
				//  else{
				//  	echo "har har bum";
				//  }
		
			
			$filter = $_GET['filter'] ??'';
			
			
			$q="SELECT * FROM book";

			$qa="SELECT * FROM book ORDER BY rupee ASC ";

			$qd="SELECT * FROM book ORDER BY rupee DESC";

			if ($filter == 'asc') {
				$qurey= mysqli_query($conn,$qa);
			}
			elseif ($filter == 'desc') {
				$qurey= mysqli_query($conn,$qd);
			}
			elseif ($filter == 'norm') {
				$qurey= mysqli_query($conn,$q);
			}
			else{
				$qurey= mysqli_query($conn,$q);
			}

			


		
			while ($res = mysqli_fetch_array($qurey)) {
		?>
		
		
			<div class="grid-item">				
				<a href="buy.php?id=<?php echo $res['id'];?>" target="_blank">
					<img src="<?php echo './'.$res['img'] ?>" alt="<?php echo $res['name'] ?>" height="250" width="150"><br>
					Book Name: <?php echo $res['name'] ?><br>
					Author Name:<?php echo $res['author'] ?><br>
					Cost:<?php echo "₹".$res['rupee'] ?><br><br><br><br><br>
				</a>
			</div>
		<?php
			}			
		?>
	</div>
</div>
</div>


</body>
</html>