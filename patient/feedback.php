<?php
include ("header.php");
session_start();
$dbusername	= $_SESSION["username"] ;
?>

	<html>
<body>
			<form action="feedback.php" method="post">
				Send a feedback to your doctor <br>

				<select name="from"><option><?php echo $dbusername ; ?></option></select>
				<br><input type = "text" name = "to" placeholder = "To (e.g doctor username)" required><br>
					<br>
				Feedback <br>
		        <textarea name ="documentation" placeholder = "documentation" ></textarea>
		        <br>
			
				<button type="submit" name = "feedback">Send Feedback</button>

		

	</form>

	<?php

	


		 if (isset($_POST['feedback'])) {
		 	
		 	# code...
		 			$from = $_POST['from'];
					$to = $_POST['to'];
					$body = $_POST['documentation'];
					$header = "from: $from";

					

						$sql2 = "INSERT INTO feedback (dr_name,username,feedback,reply) VALUES ('$to','$from','$body','')";
						$result2 = mysqli_query($conn,$sql2);
							if ($result2) {
								echo "<font color = 'blue'> Feedback saved to database </font>";

								# code...	
								//$sql = "SELECT email FROM doctor WHERE username='$to'";
						//$result = mysqli_query($conn, $sql);
							//$row = mysqli_fetch_assoc($result);
							//$emailto = $row['email'];
							//	mail($from, $emailto, $body, $header);
							//	echo "Message Sent";
								
							
							}else{
								echo "<font colour = 'red'>Feedback not saved to database</font>";

							}	
							
								$sql3 = "SELECT * from feedback WHERE dr_name = '$to'";
		$result3 = mysqli_query($conn, $sql3);
		while ($row = mysqli_fetch_assoc($result3)) {
			# code...
			//echo $row['dr_name'];
		}
						
					
		       }
				

	?>
						
</body>
</html>