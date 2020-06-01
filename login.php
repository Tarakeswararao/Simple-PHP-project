<?php 
	$connect=mysqli_connect('localhost','root','','data');

	if (isset($_GET['del'])) {
		$delete=mysqli_query($connect,"delete from trip where id='$_GET[del]'");
		if ($delete === TRUE) {
			echo "<script>alert('Deleted')</script>";
			echo "<script>window.location.href='login.php'</script>";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LogIn Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
</head>
<body>
	<div class="main1">
	<header>
			Advancher Trip
	</header>													
			<div class="container">	
				<div class="col-lg-6">
				<?php
					if(isset($_GET['edi'])){
					$view=mysqli_query($connect, "select * from trip where id = '$_GET[edi]'");
					$fetch=mysqli_fetch_array($view);
				?>
			<form method="post" action="pro.php">			
					
				<table class="table1">
					<thead>
						<tr>
							<th colspan="2">
								<h2>Your Details</h2>
							</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>First Name</td>
						<td><input type="text" size="18" name="fname" value="<?php echo $fetch['fname'];?>"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type="text" size="18" name="lname" value="<?php echo $fetch['lname'];?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" size="18" name="email" value="<?php echo $fetch['email'];?>"></td>
					</tr>
					<tr>
						<td>Date of birth</td>
						<td><input type="date"  name="age" value="<?php echo $fetch['age'];?>"></td>
					</tr>
					<tr>
						<td>Mobile Number</td>
						<td><input type="text" size="18" min="0" max="10" name="number" value="<?php echo $fetch['pnum'];?>"></td>
					</tr>
					<tr>
						<td>Plan your trip</td>
						<td><input type="Date" name="date" value="<?php echo $fetch['pdate'];?>"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div align="right">
								<a href="login.php"><button type="submit"  class="btn btn-primary" >Go back</button></a>
								<button type="submit" name="update" class="btn btn-success">Update</button>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
			
		</form>
<?php
}
else {
?>
			<form method="post" action="pro.php">
									
					<table class="table1">
					<thead>
						<tr>
							<th colspan="2">
								<h2>Your Details</h2>
							</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>First Name</td>
						<td><input type="text" size="18" name="fname" placeholder="First Name"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type="text" size="18" name="lname" placeholder="Last Name"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" size="18" name="email" placeholder="Email"></td>
					</tr>
					<tr>
						<td>Date of birth</td>
						<td><input type="date"  name="age" placeholder="Date of birth"></td>
					</tr>
					<tr>
						<td>Mobile Number</td>
						<td><input type="text" size="18" min="0" max="10" name="number" placeholder="Mobile number"></td>
					</tr>
					<tr>
						<td>Plan your trip</td>
						<td><input type="Date" name="date" placeholder="Plan your Trip"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div align="right">
								<button type="reset"  name="reset" class="btn btn-primary" >Reset</button>
								<button type="submit" name="submit" class="btn btn-success" >Submit</button>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
			
	</form>
			<?php 
		}
		?>
			</div>

			<div class="col-lg-6" style="float: right;  margin: -500px 0 0 10px; background-color: rgba(93,97,102,0.5);: ">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
			</div>		
			<div align="right" style="background: rgba(247,202,169,0.5);padding: 10px;">
				<form action="" method="post">
					<input type="text" name="ValueToSearch" placeholder ="search" bg-color="white">
					<button type="submit" name="search" class="btn btn-secondary" >Search</button>
				</form>
			</div>
	<?php 
if(isset($_POST['search'])){

			$count=0;
	$search_value=$_POST['ValueToSearch'];
	$search_result= mysqli_query($connect, "select * from trip where concat(`fname`, `lname`, `email`, `age`, `pnum`, `pdate`) like '%".$search_value."%'");
	if(mysqli_num_rows($search_result)>0){
		while($fetch=mysqli_fetch_array($search_result)){
	?>
		<table class="table2">
			<thead >
				<tr>
					<td>S.No</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Email</td>
					<td>Date of birth</td>
					<td>Mobile Number</td>
					<td>Date of plan</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</thead>
				<tbody>
						<tr>
							<td><?php echo ++$count; ?></td>
							<td><?php echo $fetch['fname']; ?></td>
							<td><?php echo $fetch['lname']; ?></td>
							<td><?php echo $fetch['email']; ?></td>
							<td><?php echo $fetch['age']; ?></td>
							<td><?php echo $fetch['pnum']; ?></td>
							<td><?php echo $fetch['pdate']; ?></td>			
							<td><a href="login.php?edi=<?php echo $fetch['id']; ?>"><button class="btn btn-warning">EDIT</button></a></td>
							<td><a href="login.php?del=<?php echo $fetch['id']; ?>"><button class="btn btn-danger">DELETE</button></a></td>
						</tr>
				</tbody>
			<?php
		}
	}
	else{
		echo "no data found";
	}
}
else {
	?>
	 
		<table class="table2">
			<thead >
				<tr>
					<td>S.No</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Email</td>
					<td>Date of birth</td>
					<td>Mobile Number</td>
					<td>Date of plan</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count=0;
					$select=mysqli_query($connect,"select * from trip");
					while ($fetch=mysqli_fetch_array($select)){
						?>
						<tr>
							<td><?php echo ++$count; ?></td>
							<td><?php echo $fetch['fname']; ?></td>
							<td><?php echo $fetch['lname']; ?></td>
							<td><?php echo $fetch['email']; ?></td>
							<td><?php echo $fetch['age']; ?></td>
							<td><?php echo $fetch['pnum']; ?></td>
							<td><?php echo $fetch['pdate']; ?></td>		
							<td><a href="login.php?edi=<?php echo $fetch['id']; ?>"><button class="btn btn-warning">EDIT</button></a></td>
							<td><a href="login.php?del=<?php echo $fetch['id']; ?>"><button class="btn btn-danger">DELETE</button></a></td>
						</tr>
						<?php 
					}	
						} 
						?>				
			</tbody>	
		</table>
		</div>
			
</body>
</html>