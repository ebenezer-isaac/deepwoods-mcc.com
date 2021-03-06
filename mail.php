<?php
error_reporting(E_ALL);
if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
  $secret = '6LewA6kZAAAAAMnKzZq7IMiRBURb5mJQw1ywKbpb';
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
  $responseData = json_decode($verifyResponse);
  if ($responseData->success)
  {
    $to = "bharathubservices2018@gmail.com";
    $subject = filter_input(INPUT_POST, "con_subject");
    $name = filter_input(INPUT_POST, "con_name");
    $phone = filter_input(INPUT_POST, "con_phone");
    $email = filter_input(INPUT_POST, "con_email");
    $message = filter_input(INPUT_POST, "con_message");
    $main .= "Hello BharatHubServices,<br>A New User filled the contact form on the webiste<br>Name : ".$name."<br>Email : ".$email."<br>Phone : ".$phone."<br>Subject : ".$subject."<br><br>".$message;
    $header = "From: ".$name."<".$email.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    $retval = mail($to, "Website Contact Request", $main, $header);
    if ($retval == true) {
      echo "
      <style>
        .alert {
          padding: 20px;
          background-color: #508c30;
          color: white;
          test-align:center;
          margin:auto;
        }

        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
      </style>
      <h2 style='text-align:center;'>Alert Messages</h2>
      <div class='alert'>
        <span class='closebtn' onclick='javascript:window.location.replace(\"contact.php\")'>&times;</span> 
        <strong>Success!</strong> Your message was send successfully.
        <script>
         setTimeout(function(){ window.location.replace(\"contact.php\"); }, 3000);
        </script>
      </div>";
      exit();
    }
  }
  else
  {
    echo "
    <style>
      .alert {
        padding: 20px;
        background-color: #FF0000;
        color: white;
        test-align:center;
        margin:auto;
      }

      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      .closebtn:hover {
        color: black;
      }
    </style>
    <h2 style='text-align:center;'>Alert Message</h2>
    <div class='alert'>
      <span class='closebtn' onclick='javascript:window.location.replace(\"contact.php\")'>&times;</span> 
      <strong>Failed!</strong> Please try captcha verification again.
      <script>
        setTimeout(function(){ window.location.replace(\"contact.php\"); }, 3000);
      </script>
    </div>";
  }
}