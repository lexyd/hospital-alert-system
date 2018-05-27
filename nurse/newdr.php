<?php
include ("header.php");
session_start();
?>

	<html>
<body>

		
			

	

			<form action="newdr.php" method="post">

			<input type ="text" name ="username" placeholder = "Dr username "required > 
			<input type ="password" name ="password" placeholder = "password" required >
			<input type ="password" name ="cpassword" placeholder = "confirm password" required >
			<input type ="email" name ="email" placeholder = "email" required >
			
		<input type="submit" value="submit" name="submit">

	</form>

	<?php  

			if(isset($_POST['submit'])){


				$username = mysqli_real_escape_string($conn , $_POST['username']);
				$password = mysqli_real_escape_string($conn ,$_POST['password']);
				$cpassword = mysqli_real_escape_string($conn ,$_POST['cpassword']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);

				if ($username && $password && $cpassword && $email ) {
						if ($password == $cpassword) {

							$sql = "INSERT into doctor (username,password,email)
									VALUES
									 ('$username','$password','$email')";

							$result = mysqli_query($conn, $sql);
							# code...
								if ($result) {
									echo "<font color='blue'>New Doctor Record Added</font>";
										
									# code...
								}else{
									echo "<font color='blue'>Record was not Added</font>";
					
								}


						}else{
							echo "<font color='red'>Password and Confirm password are not the same</font>";
						}
				}else {
					echo "<font color='red'>All fields are required!!!</font>";
					}
				}
			

	?>
						
</body>
</html>