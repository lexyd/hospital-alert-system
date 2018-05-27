<?php
include ("header.php");
session_start();
 
//$url1 = "index.php";
//header("Refresh: 10; URL=$url1");

?>
<?php 
	 $dbusername = $_SESSION["username"];
	echo $dbusername;
	?>

	<html>
	
		<body>
			WELCOME PATIENT
			<p>Click the button in case of an emmergency .</p>

					<button onclick="getLocation()">EMMERGENCY ALERT</button>
					
					<p id="demo"></p>

					                

   
 


<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>
			<form action="index.php" method="post">

				<input type = "text" name = "lat" placeholder =  "latitude" required>
				<input type = "text" name = "lon" placeholder =  "longitude" required>
				<button type="submit" name = "dirc">SEND DIRECTIONS</button>
				
				
			<a type = "submit" name = "send" href = "https://www.google.com.ng/maps" target = "_blank">send directions </a>
				
<?php

			
			

?>

				
		<?php
		$sql4 = "SELECT status from patient WHERE username = '$dbusername'";
		 	$result4 = mysqli_query($conn, $sql4);
		while ($row = mysqli_fetch_assoc($result4)){

			$status = $row['status'];
			//echo $status;
		}

			$time = date('h:i:sa');
			echo $time;

			$sql3 = "SELECT * from drugadministration WHERE username = '$dbusername'";
		$result3 = mysqli_query($conn, $sql3);
		while ($row = mysqli_fetch_assoc($result3)) {
			# code...
			//echo $row['dr_name'];
			$username = $row['username'];
			$drug_name = $row['drug_name'];
			$drug_dosage = $row['drug_dosage'];
			$tfm = $row['time_for_medication'];
			$ti = $row['time_interval'];
			$start = $row['start'];
			$end = $row['end'];
			$doc = $row['documentation'];

			
			echo'
			
			<table width = "80%" border = 1px>
												

						<tr align="left">
							<th>USERNAME</th>
							<th>DRUG NAME NAME</th>
							<th>DOSAGE NAME</th>
							<th>TIME-FOR-MEDICATION</th>
							<th>TIME INTERVAL</th>
							<th>START DATE</th>
							<th>END DATE</th>
							<th>DOCUMENTATION</th>
						</tr>
						<br>
						<tr align="left">
							<td>'.$row['username'].'</td>
							<td>'.$row['drug_name'].'</td>
							<td>'.$row['drug_dosage'].'</td>
							<td>'.$row['time_for_medication'].'</td>
							<td>'.$row['time_interval'].'</td>
							<td>'.$row['start'].'</td>
							<td>'.$row['end'].'</td>
							<td>'.$row['documentation'].'</td>
						</tr>


					</table>';



			
				
					//$time = date('H:i');
					$currenttime = date('H:i', strtotime('+1 hour'));
					
					//$minustime = date('h:i:sa', strtotime('-10 minutes'));
					//$plustime = date('h:i:sa', strtotime('+10 minutes'));
					//$diff =$tfm-$timecom ;

						
							if ($currenttime == $tfm && $status=='0') {
								# code...
								echo"KINDLY TAKE YOUR DRUG";
								echo"<script type='text/javascript'>alert('time for your drug')</script>";
							}else{
								echo"THE CURRENT TIME IS "."".$currenttime."<br>".
								"AND THE TIME FOR YOUR NEXT DRUG IS".">>".$tfm;
							}
						
						
						echo "<BR>";

				
					//$year = date('Y');
				


					echo "<br>";
					echo $currenttime . "<br>";
					//echo $minustime;
					echo "<br>";
					//echo"this is the diff " . $diff;
					}

							
			?>		
</form>

		<?php
		 if (isset($_POST['dirc'])) {

		 		$latitude = $_POST['lat'];
		 		$longitude = $_POST['lon'];

		 		 echo $latitude . "<br>";
		 		 echo $longitude;

		 		 $message = "This is my Latitude >>".$latitude."<< and longitide".$longitude.
		 		 "I need an ambu";


		 		$mail =  mail("destinyihejirika@gmail.com", "EMMERGENCY ALERT LOCATION", $message);
		 		if ($mail) {
		 			# code...\
		 			echo "mail alert send";

		 		}else{
		 			echo "mail alert not sent";
		 		}

		 	}

		 	
		 	?>
						
</body>
</html>