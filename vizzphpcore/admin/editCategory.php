<?php

include('../config.php');
include('function.php');
$catid=$_POST['category_id'];
$catname=$_POST['category_name'];
if(isset($catname)) {    
$catname=$_POST['category_name'];
$sql = "SELECT category_name FROM _category WHERE category_name = '".$catname."' LIMIT 1";
$query = mysql_query($sql);
if(mysql_num_rows($query) == '1') { 
echo '1'; 
} else { 
$sql = mysql_query("UPDATE _category SET category_name='$catname' WHERE category_id=$catid");
$result=mysql_query($sql);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
}
}

?>