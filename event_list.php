<?php
	$event_type_id = $_GET["event_type_id"];
	$servername = "srv677.hstgr.io";
	$username = "u117204720_deepwoods";
	$password = "Wj9|10g0oN";
	$dbname = "u117204720_deepwoods";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "select event_id, name from events where `event_type_id`=".$event_type_id;
	$result = $conn->query($sql);
	while($event = $result->fetch_assoc()) {	
		echo $event["event_id"]."_".$event["name"]."#";
	}
	$conn->close(); 
?>