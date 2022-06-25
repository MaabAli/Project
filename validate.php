<?php

include_once('conection.php');

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	$adminname = test_input($_POST["adminname"]);
	$password = test_input($_POST["password"]);
	/******************* امسحو الكود اللي جوا البلوك بتاع التعليق ده بعد يشتغل معاكم */
	$sql = "INSERT INTO `admin` (`username`,`password`) VALUES ('$adminname','$password')";
	$st = $conn->query($sql);
	/******************* امسحو الكود اللي جوا البلوك بتاع التعليق ده بعد يشتغل معاكم */
	$stmt = $conn->prepare("SELECT * FROM admin");
	$stmt->execute();
	$users = $stmt->fetchAll();
	foreach($users as $user) {
		if(($user['username'] == $adminname) &&
			($user['password'] == $password)) {
				header("Location: manage_donners.php");
		} else {
			echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			echo "<script> window.open('adminLogin.php','_self'); </script>";	
		}
	}
}
?>
