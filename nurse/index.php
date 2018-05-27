<?php
include ("header.php");
session_start();
?>

	<html>
<body>

		
		<?php
		
			$time = date('h:i:sa');
			echo $time;

			$sql3 = "SELECT * from drugadministration";
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

						
							if ($currenttime == $tfm) {
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
			

	

	
						
</body>
</html>