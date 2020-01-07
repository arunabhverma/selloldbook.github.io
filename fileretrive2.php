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
			background: green;
			display: grid;
			padding: 20px;
			grid-column-gap: 20px;
			grid-row-gap: 20px;
			grid-template-columns: auto auto auto auto ; 
		}
		.grid-item{
			background: white;
			padding: 20px;
			text-align: center;
			font-size: 20px;
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
	<!-- <script type="text/javascript">
		if (document.getElementById('asc')) {
			document.write("asc");
		}
		elseif(document.getElementById('desc')){
			document.write("desc");
		}
		else{
			document.write("jai mata di");
		}
		
	</script> -->
	
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
			
			<li><a id="asc" href="?catid=<?php echo $_GET['catid'] ?>&filter=asc">Asc by cost</a></li>
			<li><a id="desc" href="?catid=<?php echo $_GET['catid'] ?>&filter=desc">Des by cost</a></li>
			<li><a id="desc" href="?catid=<?php echo $_GET['catid'] ?>&filter=norm">Normal Again</a></li>
			
		</ul>

		<!-- catagory -->

	
		<ul name="select">
			<b>CATAGORY</b>
			

			<?php
				include 'conn.php';
				
				$qu="SELECT * FROM `catagory`";
				$qur= mysqli_query($conn,$qu);
		
				while ($res = mysqli_fetch_array($qur)) {
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
			// ??'' for remove the notice in line no 102 & 103"$id = $_GET['catid'] ??''; $filter = $_GET['filter']"

			$id = $_GET['catid'] ??'';
			$filter = $_GET['filter'] ??'';
					
			
			$q="SELECT * FROM book WHERE catid = '$id'  ";

			$qa="SELECT * FROM book WHERE catid = '$id' ORDER BY rupee ASC ";

			$qd="SELECT * FROM book WHERE catid = '$id' ORDER BY rupee DESC";

			if ($filter == 'asc') {
			$qurey= mysqli_query($conn,$qa);
			}
			elseif ($filter == 'desc') {
				$qurey= mysqli_query($conn,$qd);
			}elseif ($filter == 'norm') {
				$qurey= mysqli_query($conn,$q);
			}
			else{
				$qurey= mysqli_query($conn,$q);
			}	
			// if ($qurey) {
			// 	echo "yes boss";
			// }
			// else{
			// 	echo "no boss";
			// }
		
			while ($ans = mysqli_fetch_array($qurey)) {
				// echo $ans['name'];
			// }
			// if ($ans) {
			// 	echo " yes bro";
			// }
			// else{
			// 	echo " no bro";
			// }
		?>
		
		
			<div class="grid-item">				
				<a href="buy.php?id=<?php echo $ans['id'];?>" target="_blank">
					<img src="<?php echo './'.$ans['img'] ?>" alt="<?php echo $ans['name'] ?>" height="250" width="150"><br>
					Book Name: <?php echo $ans['name'] ?><br>
					Author Name:<?php echo $ans['author'] ?><br>
					Cost:<?php echo "₹".$ans['rupee'] ?><br><br><br><br><br>
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