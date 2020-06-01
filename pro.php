<?php 
	$connect=mysqli_connect('localhost','root','','data');


	if(isset($_POST['submit'])){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$date=$_POST['age'];
		$number=$_POST['number'];
		$date=$_POST['date'];	

		$insert=mysqli_query($connect,"insert into trip(fname,lname,email,age,pnum,pdate) values('$fname','$lname','$email','$age','$number','$date')");
		if($insert===TRUE){
				echo "<script>alert('added')</script>";
				echo "<script>window.location.href='login.php'</script>";
		}
		else{
			echo "something wrong";
		}

	}
	if(isset($_POST['update'])){
	
		$update= mysqli_query($connect, "update trip set fname = '$_POST[fname]', lname= '$_POST[lname]', email= '$_POST[email]', age= '$_POST[age]', pnum= '$_POST[number]', pdate= '$_POST[date]'");
		if($update===true){
			echo "<script>alert('updated succesfully')</script>";
				echo "<script>window.location.href='login.php'</script>";
		}
	}
 
?>
	