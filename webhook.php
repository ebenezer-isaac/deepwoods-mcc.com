<?php
try{session_start();}catch(Exception $e){}
$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without the <>.
$mac_calculated = hash_hmac("sha1", implode("|", $data), "5e094e3e429a44db87ce7f5cecb70d63");

if($mac_provided == $mac_calculated){
    $status="Failed";
    if($data['status'] == "Credit"){
       $status="Success";
    }
    $servername = "srv677.hstgr.io";
    $username = "u117204720_deepwoods";
    $password = "Wj9|10g0oN";
    $dbname = "u117204720_deepwoods";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE transaction_record set payment_status='".$status."',payment_id='".$data['payment_id']."'  WHERE payment_request_id='".$data['payment_request_id']."'";
    $conn->query($sql);
    $conn->close();
}
else{
    echo "Invalid MAC passed";
}

?>