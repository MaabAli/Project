<?php

$conn;

try {
	$servername = "localhost";
	$dbname = "needs";
	$username = "root";
	$password = "";
	$conn = new PDO(
		"mysql:host=$servername; dbname=needs",
		$username, $password
	);
	$conn->exec('SET NAMES utf8');
	$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
