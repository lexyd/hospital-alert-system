<?php
include ("header.php");
session_start();
$dbusername	= $_SESSION["username"] ;

			
	

?>

	<html>
<body>
			<form action="feedback.php" method="post">
				Reply patient feedback <br>

				<select name="from"><option><?php echo $dbusername; ?></option></select>
				<input type = "text" name = "id" placeholder =  "message id" required>
				<input type = "text" name = "to" placeholder =  "patient username" required>
				<textarea name ="documentation" placeholder = "Reply message" ></textarea>
				
					<br>
				<button type="submit" name = "reply">Reply Feedback</button>
	<?php					
						// $drname = $dbusername;
						

			$sql3 = "SELECT * from feedback WHERE dr_name = '$dbusername'";
		$result3 = mysqli_query($conn, $sql3);
		?>


		<table width = "50%" border = 1px>

			


												

<?php

		while ($row = mysqli_fetch_assoc($result3)) {
			# code...
			//echo $row['dr_name'];
			$id = $row['idfeedback'];
			$dr = $row['dr_name'];
			$uname = $row['username'];
			$fb = $row['feedback'];
			$rp = $row['reply'];



			echo'
			
			<table width = "50%" border = 1px>

			


												

						<tr align="left">
							<td>ID</td>
							<td>DOCTOR NAME</td>
							<td>PATIENT NAME</td>
							<td>FEEDBACK</td>
							<td>REPLY</td>
						</tr>
						<br>
						
							<td>'.$row['idfeedback'].'</td>
							<td>'.$row['dr_name'].'</td>
							<td>'.$row['username'].'</td>
							<td>'.$row['feedback'].'</td>
							<td>'.$row['reply'].'</td>
						</tr>


					</table>';
					}

							?>		
		
	</form>
			
	<?php
		 if (isset($_POST['reply'])) {

		 	# code...
		 			$from = $_POST['from'];
		 			$id = $_POST['id'];
					$to = $_POST['to'];
					$body = $_POST['documentation'];
					$header = "from: $from";

					if($from && $to && $body){

						$sql2 = "UPDATE feedback SET reply = '$body' WHERE idfeedback = '$id'";
							$result2 = mysqli_query($conn , $sql2);
							if ($result2) {
								
								echo "<font color='blue'>Feedback saved to database</font>";
								# code...
							}else{
								
								echo "<font color='red'>Feedback not saved to database</font>";

							}	
						
							//$sql = "SELECT email FROM doctor WHERE username='$to'";
						//	$result = mysqli_query($conn, $sql);
						//	$row = mysqli_fetch_assoc($result);
							//	$emailto = $row['email'];
							//	mail($from, $emailto, $body, $header);
							//	echo "Message Sent";
		
		}else {
					echo "<font color='red'>fill out all fields </font>";
				}
	}	

	?>
						
</body>
</html>