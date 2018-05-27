
<?php include ("header.php"); 
			session_start();

		?>
<html>
<body>

		

			<form action="authenticate.php" method="post">

			<input type ="text" name ="username" placeholder = "USERNAME "required > 
			<input type ="password" name ="password" placeholder = "PASSWORD" required >
		<select name = "user" required>
				<option value = "patient">Patient</option>
				<option value = "doctor">Doctor</option>
				<option value = "nurse">Nurse</option>
			</select>

		<input type="submit" value="Login" name="login">

	</form>
	
	
						
</body>
</html>