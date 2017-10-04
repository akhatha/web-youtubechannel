<?php
include('../config.php');
$user_id=$_POST['id'];
$status=$_POST['status'];
$qry = "UPDATE users SET status='$status' WHERE id=$user_id";
$result=mysql_query($qry);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>