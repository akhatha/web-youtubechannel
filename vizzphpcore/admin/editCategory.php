<?php

include('../config.php');
include('function.php');
$catid=$_POST['category_id'];
$catname=$_POST['category_name'];

$sql = mysql_query("UPDATE _category SET category_name='$catname' WHERE category_id=$catid");
$result=mysql_query($sql);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>