<?php
    include('config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

	    //Load Composer's autoloader
	require '../vendor/autoload.php';
error_reporting(0);
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
		$mail->Username   = 'sirajummunir31@gmail.com';                     //SMTP username
		$mail->Password   = 'euvmrxtelvidusya';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('sirajummunir31@gmail.com');
		$mail->addAddress($email);

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'no reply';
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
?>