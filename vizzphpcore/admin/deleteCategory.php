<?php
include('../config.php');
$catid=$_POST['category_id'];
$qry = "DELETE FROM _category WHERE category_id =$catid";
$result=mysql_query($qry);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>