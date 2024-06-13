<?php try{session_start();}catch(Exception $e){}?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>D E E P W O O D S | Payments</title>
		<meta name="description" content="Deepwoood, the age-old extravagant cultural show, showcasing the beautiful and artistic cultures of MCC">
		<meta name="author" content="Ebenezer Isaac">
		<link rel="icon" type="image/png" href="img/logo_og.png"/>
		<meta name="theme-color" content="#000000">
		<meta name="keywords" content="deepwoods, deep woods, deepwoods mcc, mcc cultural event, mcc event, mcc student union, mcc, deepwoods chennai">
		<meta property="og:title" content="Deepwoods 2021 | MCC" />
		<meta property="og:site_name" content="Click To Register Now">
		<meta property="og:url" content="https://www.deepwoods-mcc.com/index.php" />
		<meta property="og:description" content="Extravagant Cultural Show">
		<meta property="og:image" content="https://www.deepwoods-mcc.com/img/logo_og.png">
		<meta property="og:image:width" content="490" />
		<meta property="og:image:height" content="490" />
		<meta property="og:type" content="website" />
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700|IBM+Plex+Serif:300,400,500,600&display=swap" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/onepage.css" type="text/css" />
		<link rel="stylesheet" href="css/dark.css" type="text/css" />
		<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
		<link rel="stylesheet" href="css/et-line.css" type="text/css" />
		<link rel="stylesheet" href="css/animate.css" type="text/css" />
		<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
		<link rel="stylesheet" href="css/fonts.css" type="text/css" />
		<link rel="stylesheet" href="css/custom.css" type="text/css" />
	</head>
	<body class="stretched side-push-panel" onresize="reAdjust()" style="background:#000000;">
		<div id="wrapper" class="clearfix">
		<?php 
			$page = "Thank You";
			include "header.php"; 
			if(isset($_GET["payment_id"])&&(isset($_GET["payment_request_id"])||isset($_GET["email"]))){
				$payment_id = $_GET["payment_id"];

				$servername = "srv677.hstgr.io";
			    $username = "u117204720_deepwoods";
			    $password = "Wj9|10g0oN";
			    $dbname = "u117204720_deepwoods";
			    $conn = new mysqli($servername, $username, $password, $dbname);
			    if ($conn->connect_error) {
			        die("Connection failed: " . $conn->connect_error);
			    }
				if(isset($_GET["payment_request_id"])){
					$payment_request_id=$_GET["payment_request_id"];
					//echo $payment_request_id;
					$sql = "select transaction_record.*, events.name as event_name from transaction_record inner join events on transaction_record.event_id=events.event_id WHERE payment_request_id='".$payment_request_id."'";
					//echo $sql;
                }else{
                	$email=$_GET["email"];
                	//echo $email;
                	$sql = "select transaction_record.*, events.name as event_name from transaction_record inner join events on transaction_record.event_id=events.event_id WHERE transaction_record.email='".$email."'";
                	//echo $sql;
                }
                $result = $conn->query($sql);
                if($row = $result->fetch_assoc()) {
                	$transaction_id=$row["transaction_id"];
                	if($row["payment_status"]=='Success'){?>
                    	<div class='text-center' style='margin:auto'>
                    		<img class='text-center' style='margin:auto' src='img/trans_success.png'><br><?php
                    		echo "<h3><b>Transaction ID : TRNSC".sprintf('%05d', $transaction_id)."</b></h3>";
                    		echo "<h3><b>Payment ID : TRNSC".sprintf('%05d', $payment_id)."</b></h3>";
                    		echo "<img height='150px' style='border: solid black 1px' src='data:image/png;base64,";
                    		echo $row["photo"];
                    		echo "'/><br><br><h4>Name : ".$row['firstname']." ".$row['lastname']."<br>";
                    		echo "Event Name : ".$row["event_name"]."<br>";
                    		echo "TimeStamp : ".$row["date_time"]."<br>";
                    		echo "Email : ".$row["email"]."<br>";
                    		echo "Phone : ".$row["phone"]."<br>";
                    		echo "Amount : ".$row["amount"]."<br>";
                    		echo "</h4><input type='text' onclick='javascript:window.print();' class='btn btn-primary' value='Print'><br><br>
                    	</div>";
                    }else{?>
                        <div class='text-center' style='margin:auto'>
                    		<img class='text-center' style='margin:auto' src='img/trans_failed.png'><br>
							<?php echo "<h3><b>Transaction ID : TRNSC".sprintf('%05d', $transaction_id)."</b></h3>
							<br>Please Try again after some time<br><br>
						</div>";
                    }
                }else{?>
                    <div class='text-center' style='margin:auto'>
                    	<br><br>Data not found, please check ur input<br><br>
					</div>
                <?php}
			    $conn->close(); 
			}else{
				echo "<div class='text-center mt-5' style='margin:auto'>Enter the Payment ID to check payment status : <input id='payment_id' type='text'><br><br>";
				echo "Enter the Email ID to check payment status : <input id='email' type='email'><br><br><br>";
				echo "<input type='button' class='btn btn-primary' onclick='javascript:window.location.replace(\"check_payment.php?payment_id=\"+document.getElementById(\"payment_id\").value+\"&email=\"+document.getElementById(\"email\").value)' value='Search'></div>";
			}
			include "footer.php"; 
		?>
	</div>
	<div id="gotoTop" class="icon-angle-up"></div>
	<script src="js/plugins.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>
	<script src="js/functions.js"></script>
	<script>
		$(document).ready(function(){
			reAdjust();	
		});
	</script>
	</body>
</html>
<?php
	$page="Payments";
	include 'logger.php';