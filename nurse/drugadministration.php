<?php
include ("header.php");
session_start();
?>

	<html>
<body>
		<form action="newdrug.php" method="post">

		<input type ="text" name ="username" placeholder = "patient name" required >
		<input type ="text" name ="drug_name" placeholder = "drug name" required >
		<input type ="text" name ="drug_dosage" placeholder = "drug dosage" required >
		Time for medication
		<input type ="time" name ="time_for_medication" placeholder = "time for medication" required >
		<input type ="numeric" name ="time_interval" placeholder = "time interval" required >
		Start date
		<input type ="date" name ="start" placeholder = "start" required > <br>
		End date
		<input type ="date" name ="end" placeholder = "end" required >
		 <br>
		<textarea name ="documentation" placeholder = "documentation" required ></textarea>
			
			<input type="submit" value="submit drug" name="add">
			<a href="newdrug.php">ADD NEW DRUG</a>

	</form>

	<?php
		if (isset($_POST['add'])) {

				$username = $_POST['username'];
				$drug_name = $_POST['drug_name'];
				$drug_dosage = $_POST['drug_dosage'];
				$time_for_medication = $_POST['time_for_medication'];
				$time_interval = $_POST['time_interval'];
				$start = $_POST['start'];
				$end = $_POST['end'];
				$documentation = $_POST['documentation'];

			$sql2 = "INSERT INTO drugadministration (username,drug_name,drug_dosage,time_for_medication,time_interval,start,end,documentation) 
			VALUES ('$username','$drug_name','$drug_dosage','$time_for_medication','$time_interval','$start','$end','$documentation')";
						$result2 = mysqli_query($conn,$sql2);
							if ($result2) {
								echo "<font color = 'blue'> DRUG ADDED SUCESSFULLY </font>";									
							
							}else{
								echo "<font colour = 'red'> DRUG WAS NOT ADDED SUCESSFULLY </font>";

							}

					
							
							
						
			# code...

		}
		header("location:drugadministration.php");
	?>
						
</body>
</html>