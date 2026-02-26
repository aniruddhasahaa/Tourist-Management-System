<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

	    //Load Composer's autoloader
	require 'vendor/autoload.php';
    include 'includes/config.php';
    if(isset($_POST['submit']))
    {
    $fname=$_POST['fname'];
    $mnumber=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $code = rand(111111,999999);
    $sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password,verified) VALUES(:fname,:mnumber,:email,:password,:code)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':code',$code,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'myproject2010057@gmail.com';                     //SMTP username
            $mail->Password   = 'xbseiknsyudqjkvz';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('myproject2010057@gmail.com');
            $mail->addAddress($email);
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'WT - Verification code';
            $mail->Body    = "Here is the verification code:" .$code;
    
            $mail->send();
            // 
            // header("Location: ../otp.php?mail=$mail");
            // echo "<script>window.location.href = '../otp.php?mail=' + encodeURIComponent(email);</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    
    }
    else 
    {
    // echo "<script>window.location.href = '../otp.php?mail=' + encodeURIComponent(email);</script>";
    // header("Location: ../404.php?mail=$mail");
    }
    }
    $msg = "";

    // if (isset($_GET['email'])) {
    //     if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
    //         $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
    //         if ($query) {
    //             $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
    //         }
    //     } else {
    //         header("Location: index.php");
    //     }
    // }

    if (isset($_POST['otpSubmit'])) {
        include_once "conf.php";
        $otp = $_POST['otp'];
        $mail =$_POST['email'];
        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE tblusers SET verified=1 WHERE verified='$otp' AND EmailId='$mail'";
            
        if(mysqli_query($conn,$sql)){
            echo "Registered Succesfully";
            header('Location: index.php?Verification_Successful');
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    text-align: center;
}

.form-group {
    margin: 10px 5px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>OTP Verification</h2>
        <p>Please enter the OTP sent to your mobile number or email.</p>
        <form method="POST">
            <div class="form-group">
                <label for="otp">Enter email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" required>
            </div>
            <button type="submit" name="otpSubmit">Verify OTP</button>
        </form>
    </div>
</body>
</html>
