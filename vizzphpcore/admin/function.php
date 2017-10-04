<?php
function user_exist($username,$password)
{
			$pass=md5($password);
			$query=mysql_query("SELECT * FROM  users WHERE email='$username' AND password='$pass' ");
			
			$user=	mysql_fetch_assoc($query);
			$username= $user['email'];
			if(isset($username))
			{
				return $username;
			}
			else
			{		
				return false;
			}		
}

function displayResult($table_name)
{
	$query=mysql_query("SELECT * FROM $table_name ");
	  if(mysql_num_rows($query)>0)
        {
			while($row=mysql_fetch_assoc($query))
			{
						
						$result[]=$row;
			}
			return $result;
	}
}

function dbRowInsert($table_name, $form_data)
{
  // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (".implode(",", $fields).")
    VALUES('".implode("','", $form_data)."')";
    // run and return the query result resource

    return mysql_query($sql);
}

//common function for selecting name and value
function getName($tableName,$fieldName,$value)
{
			$query=mysql_query("SELECT * FROM  $tableName WHERE $fieldName ='$value' ");
			$row=	mysql_fetch_assoc($query);
			$result= $row[$fieldName];
			
			if(isset($result))
			{
				return $result;
			}
			else
			{		
				return  false;
			}
		
}

// function displayRevenues($table_name)
// {
	// $query=mysql_query("SELECT subscription.amount,channel_details.channel_name FROM subscription INNER JOIN channel_details ON subscription.channel_id = channel_details.channel_id  );
	  // if(mysql_num_rows($query)>0)
        // {
			// while($row=mysql_fetch_assoc($query))
			// {
						
						// $result[]=$row;
			// }
			// return $result;
	// }
// }


//common function for updating data

?>