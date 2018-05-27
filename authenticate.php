<?php

include "header.php";
session_start();
?>

<?php

if(isset($_POST['login'])){
		
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$user = mysqli_real_escape_string($conn, $_POST['user']);
		
				if($username && $password && $user){

					if($user == "patient"){
						$table = "patient";
						$location = "patient/index.php";
						//$user_id = "matric";
					}
					if($user == "doctor"){
						$table = "doctor";
						$location = "doctor/feedback.php";
					//	$user_id = "lec_id";			
					}
					if($user == "nurse"){
						$table = "nurse";
						$location = "nurse/drugadministration.php";
						//$user_id = "lec_id";
					}else{
						$_SESSION['response'] = '<font color="red">Please Provide correct type of user</font>';
					//	header('Location: login.php');
					}
				}
		
		$sql = "SELECT * from $table WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$numrows = mysqli_num_rows($result);
		if ($numrows != 0){
			$row = mysqli_fetch_assoc($result);
			$dbusername = $row['username'];
			$dbpassword = $row['password']; 
		//	$dbuserid = $row["$user_id"];
			
			if($password == $dbpassword || md5($password) == $dbpassword){
				//$_SESSION['$table'] = $table;
				$_SESSION['username'] = $dbusername;
				//$_SESSION['user_id'] = $dbuserid;
				header("Location: $location");			
			}else{
			$_SESSION['response'] = '<font color="red">The Password is incorrect!</font>';
			//header('Location: login.php');							
			}
			
		}else{
			$_SESSION['response'] = '<font color="red">This user doesn\'t exist</font>';
			//header('Location: login.php');			
		}
	}else{
		$_SESSION['response'] = '<font color="red">Please Fill all the Fields below Correctly</font>';
		//header('Location: login.php');
	}
	
?>

<?php 
	//$_SESSION["username"] = $dbusername;

	?>