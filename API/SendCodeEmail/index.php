<?php

// sample
// http://localhost/SpectrumServer/API/SendCodeEmail/?firstName=Boning&email=952735135@qq.com

$firstName = $_GET["firstName"];
$email = $_GET["email"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

include '../../database/databaseController.php';

$randCode = mt_rand(100000,999999);

$mbody = '<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr><td bgcolor="#ffffff" align="left" style="background-color:#ffffff; font-size: 17px; color:#7b7b7b; padding:28px 0 0 0;line-height:25px;">
	<b>Hello, '.$firstName.'</b></td></tr><tr>
	<td align="left" valign="top" style="font-size:15px; color:#7b7b7b; font-size:14px; line-height: 25px; font-family:Hiragino Sans GB; padding: 20px 0px 20px 0px">Please use the following security code for you Spectrum account. 
	</td></tr><tr><td align="left" valign="top" style="font-size:15px; color:#7b7b7b; font-size:14px; line-height: 25px; font-family:Hiragino Sans GB; padding: 20px 0px 20px 0px">Your registration code is only valid for 5 minutes.
	</td></tr><tr><td style="border-bottom:1px #f1f4f6 solid; padding: 0 0 25px 0;" align="center" class="padding">
	<table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
	<tbody><tr><td><span style="font-family:Hiragino Sans GB;">
	<div style="padding:10px 18px 10px 18px;border-radius:3px;text-align:center;text-decoration:none;background-color:#dd550c;color:#f68026;font-size:20px; font-weight:700; letter-spacing:2px; margin:0;white-space:nowrap">'
	.$randCode.'
	</div></span></td></tr></tbody></table></td></tr><tr>
	<td align="left" valign="top" style="font-size:15px; color:#7b7b7b; font-size:14px; line-height: 25px; font-family:Hiragino Sans GB; padding: 20px 0px 20px 0px">This email was send to '.$email.'
	</td></tr></tbody></table>';

$dbController = new DatabaseController();
$result = $dbController->insert_spectrum_register_account($email, $randCode);

if ($result != false)
{
	$mail = new PHPMailer(true);
	
	try {
		$mail->SMTPDebug = 0;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'SpectrumEduTeam@gmail.com';                 // SMTP username
		$mail->Password = 'SpectrumEduTeam2018';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to
	
		//Recipients
		$mail->setFrom('SpectrumEduTeam@gmail.com', 'Spectrum Support');
		$mail->addAddress($email);               // Name is optional
	
		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'New Spectrum Account';
		$mail->Body    = $mbody;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
		$mail->Send();
		echo '{"result":1}';
	} catch (Exception $e) {
		echo '{"result":0}';
	}
}
else {
	echo '{"msg":-1}';
}
?>