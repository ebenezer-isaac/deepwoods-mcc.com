<?php
    try{session_start();}catch(Exception $e){}
    echo '<pre>';
    //var_dump($_REQUEST);
    $session_id = session_id();
    $event_id=$_POST["event"];
    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $reach=$_POST["reach"];
    $input_file="passport";
    $date_time=date("Y/m/d H:i:s");
    $photo="";
    if(isset($_FILES[$input_file])) {
        $filename= $_FILES[$input_file]['name'];
        //echo $filename."<br><br>";
        $photo = chunk_split(base64_encode(file_get_contents($_FILES[$input_file]['tmp_name'])));
        //echo $file;
    }

    $servername = "srv677.hstgr.io";
    $username = "u117204720_deepwoods";
    $password = "Wj9|10g0oN";
    $dbname = "u117204720_deepwoods";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select name,price from events where `event_id`=".$event_id;
    echo $sql;
    $result = $conn->query($sql);
    $event_name="";
    $event_price="";
    while($event = $result->fetch_assoc()) {    
        $event_name = $event["name"];
        $event_price = $event["price"];
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
                //array("X-Api-Key:c227527bcdc7773db6aa02fbe3729e3c",
                 //     "X-Auth-Token:822b9b816a126f3ac9195d9e8d989155"));
                    array("X-Api-Key:test_854cbd459e051bf7ba7f9092db8",
                      "X-Auth-Token:test_6eef43bd93f613ba1e2a97697f4"));
    $payload = Array(
        'purpose' => $event_name,
        'amount' => $event_price,
        'phone' => $phone,
        'buyer_name' => $first_name." ".$last_name,
        'redirect_url' => 'https://www.ebenezer-isaac.com/demo/deepwoods.in/check_payment.php',
        'send_email' => true,
        'send_sms' => true,
        'email' => $email,
        'webhook'=>'https://www.ebenezer-isaac.com/demo/deepwoods.in/webhook.php',
        'allow_repeated_payments' => false
    );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 
    $response=json_decode($response);
    $payment_request_id = $response->payment_request->id;
    $sql = "INSERT INTO transaction_record( transaction_id, session_id, date_time, event_id, firstname, lastname, email, phone, reach, photo, amount, payment_request_id) VALUES (null, '".$session_id."', '".$date_time."','".$event_id."', '".$first_name."', '".$last_name."','".$email."', '".$phone."', '".$reach."','".$photo."', '".$event_price."','".$payment_request_id."')";
    if ($conn->query($sql) === TRUE) {
        $sql = "select transaction_id from transaction_record where payment_request_id ='".$payment_request_id."'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {    
            $transaction_id = $row["transaction_id"];
            $_SESSION["transaction_id"]=$transaction_id;
            header('location:'.$response->payment_request->longurl);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); 
    die();
?>