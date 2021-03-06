<?php 
	session_start();
	$payment_id = $_GET["payment_id"];
	$payment_status = $_GET["payment_status"];
	$payment_request_id = $_GET["payment_request_id"];
    $servername = "sql290.main-hosting.eu";
    $username = "u117204720_deepwoods";
    $password = "Wj9|10g0oN";
    $dbname = "u117204720_deepwoods";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $transaction_id=$_SESSION["transaction_id"];
	$sql = "UPDATE transaction_record SET payment_id='Doe',payment_status='Doe',payment_request_id='Doe'  WHERE transaction_id=".$transaction_id;
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
    $conn->close(); 