<?php
include('../config.php');
include('function.php');
$id=$_POST['id'];
$is_pay=$_POST['pay'];
$amount=$_POST['wallet_amount'];
$channeId=$_POST['videoChannel_id'];
$subscribedId=$_POST['user_subscribed'];
$qry = "UPDATE subscription SET is_payed='$is_pay' WHERE subscription_id=$id";
$data=array(
						'wallet_amount '=>$amount,
						'channel_id '=>$channeId,
						'subscribed_id '=>$subscribedId,
					);
//$sql = "INSERT into  wallet wallet_amount,channel_id,subscribed_id values($amount,$channeId,$subscribedId)";
if($is_pay==1){
$result=dbRowInsert("wallet",$data);
}
// echo $result;
// exit;
$result=mysql_query($qry);

if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>